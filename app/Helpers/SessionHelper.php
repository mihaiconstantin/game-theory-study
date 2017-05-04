<?php

namespace App\Helpers;


use App\Models\Condition;
use App\Models\Design;
use Illuminate\Http\Request;


class SessionHelper
{
    private $skeleton;

    private $condition;
    private $practice;


    public function __construct($condition_name, $practice_name)
    {
        // store the summary for the condition
        $this->condition = new ConditionParserHelper(Condition::getCondition($condition_name));


        // store the summary for the practice
        $this->practice = new ConditionParserHelper(Condition::getCondition($practice_name));


        // make the skeleton array that will be pushed on demand to the session
        $this->extendSkeleton();


        // push configuration to the skeleton array
        $this->pushConfig();
    }


    /**
     * Serialize request data as json and store it in the session at a specific key location.
     * If data needs to be excluded, the request keys can be passed as an array.
     *
     * @param Request $request
     * @param string $key
     * @param array $exclude
     */
    public static function pushSerialized(Request $request, string $key, array $exclude = [])
    {
        session([$key => json_encode($request->except($exclude))]);
    }


    /**
     * Determines the next game and phase number.
     * They are determined using session data.
     * For example, session config.designs.
     * Using all nine jumping scenarios.
     *
     *
     * Can be be a job for a middleware.
     *
     * @param string $context
     * @param int $current_game
     * @param int $current_phase
     */
    public static function setNextGameAndPhase(string $context, int $current_game, int $current_phase)
    {
    }


    #region skeleton makers

    /**
     * Make the complete session skeleton for the study.
     * Throughout the game just pour request data in.
     * At the end it is transferred to the database.
     * Also loads the more specific extenders (e.g., extendWithCondition).
     */
    private function extendSkeleton()
    {
        $this->skeleton = [

            // temporary data
            'temp' => [
                'consent' => false,
                'study_start' => null,
                'study_end' => null,
                'cheats' => null,
                'current_game' => null,
                'current_phase' => null,
                'next_game' => null,
                'next_phase' => null,
                'total_games' => null,
                'total_phases' => null,
                'passed_practice' => null,
            ],


            // temporary configuration data
            'config' => [
                'condition' => null,
                'practice' => null,
                'designs' => null
            ],

            // temporary score data
            'score' => [],

            // to be transferred to the database
            'storage' => [

                'data_participants' => [
                    'ip'                        => null,
                    'code'                      => null,
                    'study_name'                => null,
                    'study_time'                => null,
                    'study_integrity'           => null,
                    'condition_name'            => null,
                    'games_played'              => null,
                    'game_phases_played'        => null,
                    'practice_phases_played'    => null,
                ],


                'data_forms' => [
                    'demographic'   => null,
                    'expectation'   => null,
                    'feedback'      => null,
                ],


                'data_questionnaires' => [
                    // 'personality'   => null,
                    // 'game_question' => null,
                ],


                'data_practice' => [],


                'data_condition' => []


            ] // end of storage

        ]; // end of skeleton

        $this->extendWithPractice();
        $this->extendWithCondition();
        $this->extendWithUniqueDesigns();
        $this->extendWithScore();
    }


    /**
     * Extends the skeleton with the data_practice empty arrays.
     */
    private function extendWithPractice()
    {
        // storing for data_practice
        $temp = [];
        for ($i = 1; $i <= count($this->practice->getDesignConfig()['ordered_names']); $i++)
        {
            for ($j = 1; $j <= $this->practice->getDesignConfig()['ordered_phases'][$i]; $j++)
            {
                $temp[$i][$j] = array(
                    'game_number'   => null,
                    'phase_number'  => null,
                    'play_time'     => null,
                    'result_time'   => null,
                    'bias_type'     => null,
                    'competitive'   => null,
                    'user_choice'   => null,
                    'pc_choice'     => null,
                    'user_outcome'  => null,
                    'pc_outcome'    => null,
                );
            }
        }

        $this->skeleton['storage']['data_practice'] = $temp;
    }


    /**
     * Extends the skeleton with the data_condition empty arrays.
     */
    private function extendWithCondition()
    {
        // storing for data_condition
        $temp = [];
        for ($i = 1; $i <= count($this->condition->getDesignConfig()['ordered_names']); $i++)
        {
            for ($j = 1; $j <= $this->condition->getDesignConfig()['ordered_phases'][$i]; $j++)
            {
                $temp[$i][$j] = array(
                    'game_number'   => null,
                    'phase_number'  => null,
                    'play_time'     => null,
                    'result_time'   => null,
                    'bias_type'     => null,
                    'competitive'   => null,
                    'user_choice'   => null,
                    'pc_choice'     => null,
                    'user_outcome'  => null,
                    'pc_outcome'    => null,
                );
            }
        }

        $this->skeleton['storage']['data_condition'] = $temp;
    }


    /**
     * Extends the skeleton with the config.designs empty arrays.
     */
    private function extendWithUniqueDesigns()
    {
        $unique_names_condition = $this->condition->getDesignConfig()['unique_names'];
        $unique_names_practice = $this->practice->getDesignConfig()['unique_names'];

        foreach ($unique_names_practice as $name) {

            if(!in_array($name, $unique_names_condition))
            {
                array_push($unique_names_condition, $name);
            }
        }

        $this->skeleton['config']['designs'] = $unique_names_condition;
        $this->skeleton['config']['designs'] = array_flip($this->skeleton['config']['designs']);
    }


    /**
     * Extends the skeleton with the score empty array.
     */
    private function extendWithScore()
    {
        $total_designs = count($this->condition->getDesignConfig()['ordered_names']);
        $this->skeleton['score'] = array_combine(range(1, $total_designs), array_fill(0, $total_designs, 0));
    }

    #endregion


    #region config pushers

    /**
     * Pushes all the config data to the skeleton.
     * Config data is retrieved from specific pushers (e.g., pushConditionConfig).
     */
    private function pushConfig()
    {
        $this->pushPracticeConfig();
        $this->pushConditionConfig();
        $this->pushUniqueDesignsConfig();
    }


    /**
     * Pushes practice config data to the skeleton array at [config][practice].
     */
    private function pushPracticeConfig()
    {
        $this->skeleton['config']['practice'] = $this->practice->relevantSummary();
    }


    /**
     * Pushes condition config data to the skeleton array at [config][condition].
     */
    private function pushConditionConfig()
    {
        $this->skeleton['config']['condition'] = $this->condition->relevantSummary();
    }


    /**
     * Pushes unique designs config data to the skeleton array at [config][designs][design name].
     */
    private function pushUniqueDesignsConfig()
    {
        $design_names = array_keys($this->skeleton['config']['designs']);
        $designs = Design::whereIn('name', $design_names)->get()->toArray();

        foreach ($designs as $design)
        {
            $parsed_design = new DesignParserHelper($design);
            $this->skeleton['config']['designs'][$design['name']] = $parsed_design->relevantSummary();
        }
    }

    #endregion


    #region getters

    /**
     * Returns the skeleton array that will be pushed to the session.
     *
     * @return array
     */
    public function getSkeleton() : array
    {
        return $this->skeleton;
    }

    #endregion

}