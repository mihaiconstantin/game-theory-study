<?php

namespace App\Helpers;


use App\Models\DataConfig;
use App\Models\DataForm;
use App\Models\DataGamePhase;
use App\Models\DataParticipant;
use App\Models\DataQuestionnaire;
use Illuminate\Contracts\Logging\Log;


class DataArchiveHelper
{
    private $session;
    private $session_config;

    private $data_participants;
    private $data_questionnaires;
    private $data_forms;
    private $data_game_phases;
    private $data_config;



    public function __construct($session_storage, $session_config)
    {
        $this->session = $session_storage;
        $this->session_config = $session_config;


        $this->loadDataParticipant();
        $this->loadDataQuestionnaire();
        $this->loadDataForm();
        $this->loadGamePhase();
        $this->loadConfig();
    }



    /**
     * Saves the archive to the database.
     * Returns true | false on action.
     *
     * @return bool
     */
    public function saveArchive() : bool
    {
        // Prepare all the Eloquent models.

        $dataParticipant = new DataParticipant($this->data_participants);
        $dataConfig = new DataConfig($this->data_config);
        $dataForm = new DataForm($this->data_forms);
        $dataQuestionnaire = new DataQuestionnaire($this->data_questionnaires);

        $collectionDataGamePhase = [];

        foreach ($this->data_game_phases as $gamePhase)
        {
            $collectionDataGamePhase[] = new DataGamePhase($gamePhase);
        }


        $status = true;

        try {
            // Save the data.

            $dataParticipant->save();

            $dataParticipant->data_config()->save($dataConfig);
            $dataParticipant->data_form()->save($dataForm);
            $dataParticipant->data_questionnaire()->save($dataQuestionnaire);
            $dataParticipant->data_game_phases()->saveMany($collectionDataGamePhase);
        }
        catch (\Exception $e)
        {
            Log::critical('Error while saving|code:' . $this->data_participants['code'], [
                $this->data_participants,
                $this->data_config,
                $this->data_forms,
                $this->data_questionnaires,
                $this->data_game_phases
            ]);

            $status = false;
        }


        return $status;

    }


    /**
     * Flattens an array of games and phases to match the storage format
     * of data_games_phases table, given the appropriate data context.
     *
     * @param string $context
     * @return array
     */
    private function flattenGamePhases(string $context) : array
    {
        $all_phases = [];

        foreach ($this->session['data_' . $context] as $game_number => $phases)
        {
            foreach ($phases as $index => $phase)
            {
                $all_phases[] = [
                    'phase_context'     => $context,
                    'game_number'       => $phase['game_number'],
                    'phase_number'      => $phase['phase_number'],
                    'play_time'         => $phase['end_play_time'] - $phase['start_play_time'],
                    'bias_type'         => $phase['bias_type'],
                    'competitive'       => $phase['competitive'],
                    'user_choice'       => (int) $phase['user_choice'],
                    'pc_choice'         => (int) $phase['pc_choice'],
                    'user_outcome'      => (int) $phase['user_outcome'],
                    'pc_outcome'        => (int) $phase['pc_outcome']
                ];
            }
        }

        return $all_phases;
    }


    #region loaders for preparing the data

    private function loadDataParticipant()
    {
        $this->data_participants = $this->session['data_participants'];
        unset($this->data_participants['id']);
    }


    private function loadDataQuestionnaire()
    {
        $personality = [];

        foreach ($this->session['data_questionnaires'] as $questionnaire_name => $data)
        {
            if (is_array($data))
            {
                $this->data_questionnaires['game_question'] = json_encode($data);
            }

            $personality[$questionnaire_name] = $data;
        }

        $this->data_questionnaires['personality'] = json_encode($personality);

        unset($personality);
    }


    private function loadDataForm()
    {
        $this->data_forms['demographic'] = $this->session['data_forms']['demographic'];
        $this->data_forms['expectation'] = $this->session['data_forms']['expectation'];
        $this->data_forms['feedback'] = $this->session['data_forms']['feedback'];
    }


    private function loadGamePhase()
    {
        $this->data_game_phases = array_merge(
            $this->flattenGamePhases('practice'),
            $this->flattenGamePhases('condition')
        );
    }


    private function loadConfig()
    {
        $this->data_config['config'] = json_encode($this->session_config);
    }

    #endregion


    #region getters

    /**
     * Fetches the parsed (database-ready) data for data_participants table.
     * @return mixed
     */
    public function getDataParticipants()
    {
        return $this->data_participants;
    }


    /**
     * Fetches the parsed (database-ready) data for data_questionnaires table.
     * @return mixed
     */
    public function getDataQuestionnaires()
    {
        return $this->data_questionnaires;
    }


    /**
     * Fetches the parsed (database-ready) data for data_forms table.
     * @return mixed
     */
    public function getDataForms()
    {
        return $this->data_forms;
    }


    /**
     * Fetches the parsed (database-ready) data for data_game_phases table.
     * @return mixed
     */
    public function getDataGamePhases()
    {
        return $this->data_game_phases;
    }


    /**
     * Fetches the parsed (database-ready) data for data_configs table.
     * @return mixed
     */
    public function getDataConfig()
    {
        return $this->data_config;
    }

    #endregion

}






















