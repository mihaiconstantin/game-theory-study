<?php

namespace App\Http\Controllers;

use App\Helpers\DataExportHelper;
use App\Models\StudyLoader;
use Exception;

class DataController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    /**
     * Zip and export the data.
     *
     * @return string|\Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function export()
    {
        $study_name = StudyLoader::getLoadedStudy();

        try {
            $export = new DataExportHelper($study_name);
        } catch(Exception $e) {
            return 'An error occurred: ' . $e->getMessage();
        }

        $file = $export->zip('hexaco', 'bfi', $study_name);

        return response()->download($file, $name = null, ['Content-Type' => 'application/zip']);
    }



    /**
     * Attempt to reconstruct the participant data from the log file in case an error occurred.
     *
     * @param $participantId
     * @param $jsonErrorLog
     */
    public function emergencyExport($participantId, $jsonErrorLog)
    {
        $result = json_decode($jsonErrorLog, true);

        $data_participant_id = $participantId;

        DB::table('data_forms')->insert([
            [
                'data_participant_id' => $data_participant_id,
                'demographic' => $result[2]['demographic'],
                'expectation' => '{}',
                'feedback' => $result[2]['feedback']
            ]
        ]);

        DB::table('data_questionnaires')->insert([
            [
                'data_participant_id' => $data_participant_id,
                'personality' => $result[3]['personality'],
                'game_question' => $result[3]['game_question'],
            ]
        ]);

        foreach ($result[4] as $index => $item)
        {
            if ($result[4][$index]['game_number'] != null)
            {
                $result[4][$index]['data_participant_id'] = $data_participant_id;
                DB::table('data_game_phases')->insert([$result[4][$index]]);
            }
        }


        dd(
            "Insertion finished.",
            $result
        );
    }
}
