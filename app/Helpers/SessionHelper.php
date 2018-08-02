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
     * Builds an array that can be use to overwrite the appropriate array within the session storage.
     *
     * @param $context
     * @param $current_game
     * @param $current_phase
     * @param Request $request
     * @return array
     */
    public static function fillGameResult($context, $current_game, $current_phase, Request $request) : array
    {
        $competitive = session('config.' . $context . '.competitive')[$current_game][$current_phase];

        $pc_choice = $competitive == 0 ? 1 : 2;

        $user_choice = $request->input('option');

        $outcomes = explode('#', session('config.designs.' . session('config.' . $context . '.designs')[$current_game] . '.outcomes')[$user_choice . '#' . $pc_choice]);


        return [
            'game_number'       => $current_game,
            'phase_number'      => $current_phase,
            'start_play_time'   => $request->input('_time'),
            'end_play_time'     => microtime(true),
            'bias_type'         => session('config.' . $context . '.biases')[$current_game],
            'competitive'       => $competitive,
            'user_choice'       => $user_choice,
            'pc_choice'         => $pc_choice,
            'user_outcome'      => $outcomes[0],
            'pc_outcome'        => $outcomes[1]
        ];

    }


    /**
     * Determines the next game and phase number.
     * They are determined using session data.
     * For example, session config.designs.
     * Using all nine jumping scenarios.
     *
     *
     * Can it be a job for a middleware?
     *
     * @param string $context
     * @param string $previous_url
     * @return array
     */
    public static function whereNext(string $context, string $previous_url) : array
    {
        $current_game = null;
        $current_phase = null;
        $next_game = null;
        $next_phase = null;

        $previous_url = array_values(explode('/', $previous_url));


        // was the game played in the correct bounds?
        if (array_key_exists($previous_url[5], session('config.' . $context . '.designs')))
        {
            $current_game = $previous_url[5];
        }


        // was the game phase played in the correct bounds?
        if ($current_game && array_key_exists($previous_url[6], session('config.' . $context . '.competitive')[$current_game]))
        {
            $current_phase = $previous_url[6];
        }


        // At this point we know whether the game page for which the post request came is from a
        // valid URL and we can safely determine the parameters for the next game and phase.
        if ($current_game && $current_phase)
        {
            $total_games = count(session('config.' . $context . '.designs'));
            $total_phases = session('config.' . $context . '.phases.' . $current_game);


            // four possible cases of increments <- assuming correctness
            if ($current_game == $total_games && $current_phase == $total_phases)
            {
                $next_game = 0;
                $next_phase = 0;
            }
            elseif ($current_game == $total_games && $current_phase < $total_phases)
            {
                $next_game = $current_game;
                $next_phase = $current_phase + 1;
            }
            elseif ($current_game < $total_games && $current_phase == $total_phases)
            {
                $next_game = $current_game + 1;
                $next_phase = 1;
            }
            elseif ($current_game < $total_games && $current_phase < $total_phases)
            {
                $next_game = $current_game;
                $next_phase = $current_phase + 1;
            }
        }


        // output everything: null values if things went wrong, numeric values if right
        return [
            'current_game' => $current_game,
            'current_phase' => $current_phase,
            'next_game' => $next_game,
            'next_phase' => $next_phase
        ];
    }


    #region fetchers

    /**
     * Fetches the data for the play table given the appropriate context (i.e., practice or condition).
     *
     * @param $context
     * @param $current_game
     * @param $current_phase
     * @return array
     */
    public static function fetchGameViewData($context, $current_game, $current_phase) : array
    {
        return [
            'condition_name'        => session('config.' . $context . '.info.title'),
            'condition_text'        => session('config.' . $context . '.text.' . session('config.' . $context . '.biases')[$current_game]),
            'condition_opponent'    => session('config.' . $context . '.info.opponent'),
            'design_outcomes'       => session('config.designs.' . session('config.' . $context . '.designs')[$current_game] . '.outcomes'),
            'design_label'          => session('config.designs.' . session('config.' . $context . '.designs')[$current_game] . '.info.label'),
            'game_number'           => $current_game,
            'phase_number'          => $current_phase
        ];
    }


    /**
     * Fetches the data for the result table given the appropriate context (i.e., practice or condition).
     *
     * @param $context
     * @param $current_game
     * @param $current_phase
     * @return array
     */
    public static function fetchResultViewData($context, $current_game, $current_phase) : array
    {
        $base_key_storage = 'storage.data_' . $context . '.' . $current_game . '.' . $current_phase . '.';
        $base_key_designs = 'config.designs.' . session('config.' . $context . '.designs.' . $current_game) . '.';

        $user_choice = session($base_key_storage . 'user_choice');
        $pc_choice = session($base_key_storage . 'pc_choice');
        $outcome = session($base_key_designs . 'text.' . $user_choice . '#' . $pc_choice);

        return [
            'condition_name'             => session('config.' . $context . '.info.title'),
            'game_number'                => $current_game,
            'phase_number'               => $current_phase,
            'design_outcome_description' => $outcome,
            'condition_opponent'         => session('config.' . $context . '.info.opponent'),
            'design_label'               => session($base_key_designs . 'info.label'),
            'user_choice'                => $user_choice,
            'pc_choice'                  => $pc_choice,
            'user_outcome'               => session($base_key_storage . 'user_outcome'),
            'pc_outcome'                 => session($base_key_storage . 'pc_outcome'),
            'store_route'                => $context == 'condition' ? 'game.store' : 'practice.store'
        ];

    }


    /**
     * Fetches the data for the score table given the (only for condition).
     *
     * @param $current_game
     * @return array
     */
    public static function fetchScoreViewData($current_game) : array
    {
        return [
            'total_games' => count(session('config.condition.designs')),
            'total_phases' => session('config.condition.phases.' . $current_game),
            'user_game_score' => session('score.' . $current_game . '.user'),
            'pc_game_score' => session('score.' . $current_game . '.pc'),
        ];
    }


    #endregion


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
                'study_start'       => null,
                'study_end'         => null,

                'cheats'            => null,

                'next_game'         => null,
                'next_phase'        => null,

                'consent'           => false,
                'passed_practice'   => false,
                'show_score'        => false,
                'finish'            => false
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
                    'id'                        => null,
                    'ip'                        => null,
                    'code'                      => null,
                    'study_name'                => null,
                    'study_time'                => null,
                    'condition_name'            => null,
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
                    'game_number'       => null,
                    'phase_number'      => null,
                    'start_play_time'   => null,
                    'end_play_time'     => null,
                    'bias_type'         => null,
                    'competitive'       => null,
                    'user_choice'       => null,
                    'pc_choice'         => null,
                    'user_outcome'      => null,
                    'pc_outcome'        => null,
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
                    'game_number'       => null,
                    'phase_number'      => null,
                    'start_play_time'   => null,
                    'end_play_time'     => null,
                    'bias_type'         => null,
                    'competitive'       => null,
                    'user_choice'       => null,
                    'pc_choice'         => null,
                    'user_outcome'      => null,
                    'pc_outcome'        => null,
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
        // $this->skeleton['score'] = array_combine(range(1, $total_designs), array_fill(0, $total_designs, 0));
        $this->skeleton['score'] = array_combine(
            range(1, $total_designs),
            array_fill(0, $total_designs, ['user' => 0, 'pc' => 0]));
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