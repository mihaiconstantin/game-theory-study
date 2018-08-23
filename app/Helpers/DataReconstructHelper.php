<?php

namespace App\Helpers;


use App\Models\DataParticipant;


class DataReconstructHelper
{
    protected $collection;

    protected $dataParticipants;
    protected $dataConfigs;
    protected $dataForms;
    protected $dataQuestionnaires;
    protected $dataGamePhases;



    public function __construct($study_name)
    {
        $this->collection = $this->loadCollection($study_name);
        $this->populateFields();
    }



    #region data loaders

    /**
     * Returns a collection of Eloquent models representing all the
     * records in the data_participants table, fetched by study
     * name. It includes all the relationships.
     *
     * @param $study_name
     * @return mixed
     */
    private function loadCollection($study_name)
    {
        return DataParticipant::where('study_name', $study_name)->get();
    }


    /**
     * Retrieves all the database tables from the collection and
     * flattens them as arrays into individual class fields.
     */
    private function populateFields()
    {
        // With data_participants, data_forms data_questionnaires, and data_config tables.
        foreach ($this->collection as $model)
        {
            $this->dataParticipants[] = $model['original'];
            $this->dataForms[] = $model->data_form->toArray();
            $this->dataQuestionnaires[] = $model->data_questionnaire->toArray();
            $this->dataConfigs[] = $model->data_config->toArray();
        }


        // With data_game_phases.
        foreach ($this->collection as $dataParticipantModel)
        {
            foreach ($dataParticipantModel->data_game_phases->toArray() as $phase)
            {
                $this->dataGamePhases[] = $phase;
            }
        }

    }

    #endregion


    #region json decoders

    /**
     * Applies all the specialized decoders.
     */
    public function jsonDecodeFields()
    {
        // Add specialized json decoders here.

        $this->decodeDataForms();
        $this->decodeDataQuestionnaires();
    }


    /**
     * Specialize decoder for table data_forms. It decodes
     * all json fields to array key-value pairs.
     */
    protected function decodeDataForms()
    {
        foreach ($this->dataForms as $index => $dataForm)
        {
            $this->dataForms[$index]['file'] = array_merge(
                json_decode($dataForm['demographic'], true),
                json_decode($dataForm['expectation'], true),
                json_decode($dataForm['feedback'], true)
            );
        }

    }


    /**
     * Specialize decoder for table data_questionnaires.
     * It decodes all json fields to array key-value
     * pairs.
     */
    protected function decodeDataQuestionnaires()
    {
        foreach ($this->dataQuestionnaires as $index => $dataQuestionnaire)
        {
            $this->dataQuestionnaires[$index]['game_question'] = json_decode($dataQuestionnaire['game_question'], true);
            $this->dataQuestionnaires[$index]['game_opponent_evaluation'] = json_decode($dataQuestionnaire['game_opponent_evaluation'], true);
            $this->dataQuestionnaires[$index]['study_evaluation'] = json_decode($dataQuestionnaire['study_evaluation'], true);
        }

        foreach ($this->dataQuestionnaires as $index => $dataQuestionnaire)
        {
            foreach ($dataQuestionnaire['study_evaluation'] as $questionnaire_name => $data)
            {
                $this->dataQuestionnaires[$index]['study_evaluation'][$questionnaire_name] = json_decode($data, true);
            }

            foreach ($dataQuestionnaire['game_question'] as $questionnaire_name => $data)
            {
                $this->dataQuestionnaires[$index]['game_question'][$questionnaire_name] = json_decode($data, true);
            }

            foreach ($dataQuestionnaire['game_opponent_evaluation'] as $questionnaire_name => $data)
            {
                $this->dataQuestionnaires[$index]['game_opponent_evaluation'][$questionnaire_name] = json_decode($data, true);
            }
        }
    }

    #endregion


    #region getters

    /**
     * Gets a collection of Eloquent models for a selected study name.
     * It includes all the relationships for data_participants.
     *
     * @return mixed
     */
    public function getCollection()
    {
        return $this->collection;
    }


    /**
     * Returns the respective database table as an array.
     *
     * @return array
     */
    public function getDataParticipants() : array
    {
        return $this->dataParticipants;
    }


    /**
     * Returns the respective database table as an array.
     *
     * @return array
     */
    public function getDataConfigs() : array
    {
        return $this->dataConfigs;
    }


    /**
     * Returns the respective database table as an array.
     *
     * @return array
     */
    public function getDataForms() : array
    {
        return $this->dataForms;
    }


    /**
     * Returns the respective database table as an array.
     *
     * @return array
     */
    public function getDataQuestionnaires() : array
    {
        return $this->dataQuestionnaires;
    }


    /**
     * Returns the respective database table as an array.
     *
     * @return array
     */
    public function getDataGamePhases() : array
    {
        return $this->dataGamePhases;
    }

    #endregion

}