<?php

namespace App\Helpers;


use Mockery\Exception;

class DataExportHelper extends DataReconstructHelper
{

    public function __construct($study_name)
    {
        parent::__construct($study_name);

        // Stop the execution if there is no data for the selected study name.
        if (!$this->collection->count())
        {
            throw new \Exception('There is no data available to prepare the export.');
        }

        // Decode the fields for array-ready access.
        $this->jsonDecodeFields();
    }


    #region headers

    private function headerDataParticipants() : string
    {
        return implode(',', array_keys($this->dataParticipants[0]));
    }


    private function headerDataGamePhases() : string
    {
        return implode(',', array_keys($this->dataGamePhases[0]));
    }


    private function headerDataQuestionnaires() : string
    {
        return implode(',', array_filter(array_keys($this->dataQuestionnaires[0]), function($key_name){
            return $key_name != 'personality' && $key_name != 'game_question' && $key_name != 'game_opponent_evaluation' ? true : false;
        }));
    }


    private function headerDataQuestionnairesGameQuestion() : string
    {
        return $this->headerDataQuestionnaires() . ',' . implode(',', array_keys($this->dataQuestionnaires[0]['game_question'][1]));
    }


    private function headerDataQuestionnairesGameOpponentEvaluation() : string
    {
        return $this->headerDataQuestionnaires() . ',' . implode(',', array_keys($this->dataQuestionnaires[0]['game_opponent_evaluation'][1]));
    }


    private function headerDataQuestionnairesPersonality($questionnaire_name) : string
    {
        return $this->headerDataQuestionnaires() . ',' . implode(',', array_keys($this->dataQuestionnaires[0]['personality'][$questionnaire_name]));
    }


    private function headerDataForms() : string
    {

        return implode(',', array_filter(array_keys($this->dataForms[0]), function($key_name){
            return
                $key_name != 'demographic' &&
                $key_name != 'expectation' &&
                $key_name != 'feedback'    &&
                $key_name != 'file' ? true : false;
        }))
            . ',' . implode(',', array_keys($this->dataForms[0]['file']));
    }


    private function headerDataConfigs() : string
    {
        return implode(',', array_keys($this->dataConfigs[0]));
    }

    #endregion


    #region contents

    private function contentDataParticipants() : string
    {
        $content = null;

        foreach ($this->dataParticipants as $dataParticipant)
        {
            $content .= implode(',', $dataParticipant) . PHP_EOL;
        }

        return $content;
    }


    private function contentDataGamePhases() : string
    {
        $content = null;

        foreach ($this->dataGamePhases as $dataGamePhase)
        {
            $content .= implode(',', $dataGamePhase) . PHP_EOL;
        }

        return $content;
    }


    private function contentDataQuestionnairesGameQuestion() : string
    {
        $content = null;

        foreach ($this->dataQuestionnaires as $index => $dataQuestionnaire)
        {
            foreach ($dataQuestionnaire['game_question'] as $data)
            {
                $base_content = implode(',', [$dataQuestionnaire['id'], $dataQuestionnaire['data_participant_id'], $dataQuestionnaire['created_at'], $dataQuestionnaire['updated_at']]) . ',';
                $game_content = implode(',', $data) . PHP_EOL;
                $content .= $base_content . $game_content;
            }
        }

        return $content;
    }


    private function contentDataQuestionnairesGameOpponentEvaluation() : string
    {
        $content = null;

        foreach ($this->dataQuestionnaires as $index => $dataQuestionnaire)
        {
            foreach ($dataQuestionnaire['game_opponent_evaluation'] as $data)
            {
                $base_content = implode(',', [$dataQuestionnaire['id'], $dataQuestionnaire['data_participant_id'], $dataQuestionnaire['created_at'], $dataQuestionnaire['updated_at']]) . ',';
                $game_content = implode(',', $data) . PHP_EOL;
                $content .= $base_content . $game_content;
            }
        }

        return $content;
    }


    private function contentDataQuestionnairesPersonality($questionnaire_name) : string
    {
        $content = null;

        foreach ($this->dataQuestionnaires as $dataQuestionnaire)
        {
            $base_content = implode(',',
                    [
                        $dataQuestionnaire['id'],
                        $dataQuestionnaire['data_participant_id'],
                        $dataQuestionnaire['created_at'],
                        $dataQuestionnaire['updated_at']
                    ]) . ',';


            $personality_content = implode(',', $dataQuestionnaire['personality'][$questionnaire_name]) . PHP_EOL;
            $content .= $base_content . $personality_content;
        }

        return $content;
    }


    private function contentDataForms() : string
    {
        $content = null;

        foreach ($this->dataForms as $dataForm)
        {
            $base_content = implode(',',
                    [
                        $dataForm['id'],
                        $dataForm['data_participant_id'],
                        $dataForm['created_at'],
                        $dataForm['updated_at']
                    ]) . ',';


            $file = array_map(function($values){
                return str_replace(',', ' ', $values);
            }, $dataForm['file']);


            $form_content = implode(',', $file) . PHP_EOL;
            $content .= $base_content . $form_content;
        }

         return $content;
    }


    private function contentDataConfigs() : string
    {
        $content = null;

        foreach ($this->dataConfigs as $dataConfig)
        {
            $content .= implode(',', $dataConfig) . PHP_EOL . PHP_EOL . PHP_EOL . PHP_EOL . PHP_EOL;
        }

        return $content;
    }

    #endregion


    #region writers

    /**
     * Writes the data_participants table to disk as .csv and returns the filename.
     *
     * @param null $notes
     * @return string
     */
    public function writeDataParticipants($notes = null) : string
    {
        $filename = 'data_participants' . time();

        return $this->poet($filename, $this->headerDataParticipants(), $this->contentDataParticipants(), $notes);
    }


    /**
     * Writes the data_game_phases table to disk as .csv and returns the filename.
     *
     * @param null $notes
     * @return string
     */
    public function writeDataGamePhases($notes = null) : string
    {
        $filename = 'data_game_phases' . time();

        return $this->poet($filename, $this->headerDataGamePhases(), $this->contentDataGamePhases(), $notes);

    }


    /**
     * Writes the data_questionnaires (game questions) table to disk as .csv and returns the filename.
     *
     * @param null $notes
     * @return string
     */
    public function writeDataQuestionnairesGameQuestions($notes = null) : string
    {
        $filename = 'data_game_questions' . time();
        return $this->poet($filename, $this->headerDataQuestionnairesGameQuestion(), $this->contentDataQuestionnairesGameQuestion(), $notes);
    }


    /**
     * Writes the data_questionnaires (game opponent evaluation) table to disk as .csv and returns the filename.
     *
     * @param null $notes
     * @return string
     */
    public function writeDataQuestionnairesGameOpponentEvaluation($notes = null) : string
    {
        $filename = 'data_game_opponent_evaluation' . time();
        return $this->poet($filename, $this->headerDataQuestionnairesGameOpponentEvaluation(), $this->contentDataQuestionnairesGameOpponentEvaluation(), $notes);
    }


    /**
     * Writes the data_questionnaires (personality) table to disk as .csv and returns the filename.
     *
     * @param $questionnaire_name
     * @param null $notes
     * @return string
     */
    public function writeDataQuestionnairesPersonality($questionnaire_name, $notes = null) :string
    {
        $filename = 'data_questionnaires_' . $questionnaire_name . time();

        return $this->poet($filename, $this->headerDataQuestionnairesPersonality($questionnaire_name), $this->contentDataQuestionnairesPersonality($questionnaire_name), $notes);
    }


    /**
     * Writes the data_forms table to disk as .csv and returns the filename.
     *
     * @param null $notes
     * @return string
     */
    public function writeDataForms($notes = null) : string
    {
        $filename = 'data_forms' . time();

        return $this->poet($filename, $this->headerDataForms(), $this->contentDataForms(), $notes);
    }


    /**
     * Writes the data_configs table to disk as .csv and returns the filename.
     *
     * @param null $notes
     * @return string
     */
    public function writeDataConfigs($notes = null) : string
    {
        $filename = 'data_configs' . time();

        return $this->poet($filename, $this->headerDataConfigs(), $this->contentDataConfigs(), $notes, 'txt');
    }

    #endregion


    # region loyalty

    private function poet($filename, $header, $body, $notes = null, $extension = 'csv')
    {
        $contents = $notes . $header . PHP_EOL . $body;

        $path = storage_path() . DIRECTORY_SEPARATOR . 'datasets' . DIRECTORY_SEPARATOR . $filename . '.' . $extension;


        try
        {
            // Open or create a new file using the filename provided.
            $handle = fopen($path, 'w+');

            // Write the contents and close the file.
            fwrite($handle, $contents);
            fclose($handle);

            return $path;
        }
        catch (\Exception $e)
        {
            die('Failed to write the file "' . $filename . '". Save the name of the file for future reference and check the storage location.');
        }

    }


    /**
     * Builds a .zip archive with all the relevant datasets collected during study.
     * Returns the created archive file path or success.
     *
     * @param string $questionnaire_name_one
     * @param string $questionnaire_name_two
     * @param string $filename
     * @return string
     */
    public function zip(string $questionnaire_name_one, string $questionnaire_name_two, string $filename) : string
    {
        $files = [
            $this->writeDataParticipants(),
            $this->writeDataConfigs(),
            $this->writeDataForms(),
            $this->writeDataQuestionnairesGameQuestions(),
            $this->writeDataQuestionnairesGameOpponentEvaluation(),
            $this->writeDataQuestionnairesPersonality($questionnaire_name_one),
            $this->writeDataQuestionnairesPersonality($questionnaire_name_two),
            $this->writeDataGamePhases()
        ];

        $filename = $filename . '_' . time();
        $name = storage_path() . DIRECTORY_SEPARATOR . 'datasets' . DIRECTORY_SEPARATOR . $filename . '.zip';


        try
        {
            $zip = new \ZipArchive();
            $zip->open($name, \ZipArchive::CREATE);

            // Add the files to the archive.
            foreach ($files as $file)
            {
                $zip->addFile($file, basename($file));
            }

            $zip->close();

            // Make sure we delete the files once the archive is done.
            foreach ($files as $file)
            {
                unlink($file);
            }

            return $name;
        }
        catch (\Exception $e)
        {
            echo 'error message:' . $e->getMessage() . '<br>';
            die(PHP_EOL . 'Failed to write the archive "' . $filename . '". Save the name of the file for future reference and check the storage location.');
        }

    }

    #endregion

}