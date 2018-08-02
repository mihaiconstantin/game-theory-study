<?php

namespace App\Helpers;

use App\Models\Design;

class ConditionParserHelper
{
    // ordered keys of the fields refer to the game numbers, not randomization

    private $rawCondition;

    private $designConfig;
    private $biasConfig;

    private $conditionConfig;
    private $conditionInfo;
    private $conditionText;


    public function __construct($rawCondition)
    {
        $this->rawCondition = $rawCondition;

        $this->loadDesignConfig();
        $this->loadBiasConfig();

        $this->loadConditionConfig();
        $this->loadConditionInfo();
        $this->loadConditionText();

        // randomize the order of the designs (games)
        if ($rawCondition['random_design_chain'] == 1)
        {
            $this->randomizeDesignOrder();
        }


        // randomize the competitive behaviour within each design (game)
        if ($rawCondition['random_design_iteration'] == 1)
        {
            $this->randomizePhasesOrder();
        }
    }


    /**
     * Return only the relevant configuration for the session.
     *
     * @return array
     */
    public function relevantSummary() : array
    {
        return [
            'designs' => $this->designConfig['ordered_names'],
            'phases' => $this->designConfig['ordered_phases'],
            'ratios' => $this->conditionConfig['ordered_ratio'],
            'competitive' => $this->conditionConfig['ordered_competitive'],
            'biases' => $this->biasConfig['ordered_types'],
            'text' => $this->conditionText,
            'info' => $this->conditionInfo
        ];
    }


    /**
     * Randomizes the order the designs are played.
     */
    private function randomizeDesignOrder()
    {
        $order = range(1, count($this->designConfig['ordered_names']));
        shuffle($order);

        array_multisort($order,
            $this->designConfig['ordered_names'],
            $this->designConfig['ordered_phases'],
            $this->biasConfig['ordered_types'],
            $this->biasConfig['ordered_values'],
            $this->conditionConfig['ordered_ratio'],
            $this->conditionConfig['ordered_competitive']
        );

        $this->designConfig['ordered_names'] = BasicHelper::reindexArray($this->designConfig['ordered_names']);
        $this->designConfig['ordered_phases'] = BasicHelper::reindexArray($this->designConfig['ordered_phases']);
        $this->biasConfig['ordered_types'] = BasicHelper::reindexArray($this->biasConfig['ordered_types']);
        $this->biasConfig['ordered_values'] = BasicHelper::reindexArray($this->biasConfig['ordered_values']);
        $this->conditionConfig['ordered_ratio'] = BasicHelper::reindexArray($this->conditionConfig['ordered_ratio']);
        $this->conditionConfig['ordered_competitive'] = BasicHelper::reindexArray($this->conditionConfig['ordered_competitive']);
    }


    /**
     * Randomizes the competitive behaviour within each game (phases aka iterations).
     */
    private function randomizePhasesOrder()
    {
        for ($i = 1; $i <= count($this->conditionConfig['ordered_competitive']); $i++)
        {
            shuffle($this->conditionConfig['ordered_competitive'][$i]);
            $this->conditionConfig['ordered_competitive'][$i] = BasicHelper::reindexArray($this->conditionConfig['ordered_competitive'][$i]);
        }

    }


    #region config loaders

    /**
     * Loads the configuration for the design names present in the design chain.
     */
    private function loadDesignConfig()
    {
        // design name (value) for each game (key)
        $ordered_names = BasicHelper::reindexArray(BasicHelper::parseChainRight($this->rawCondition['design_chain']));
        $unique_names = array_unique($ordered_names);


        $temp = [];
        foreach ($unique_names as $name)
        {
            $temp[] = Design::getByName($name)['iterations'];
        }
        $unique_phases = array_combine(array_values($unique_names), $temp);
        unset($temp);


        $temp = [];
        foreach ($ordered_names as $name)
        {
            $temp[] = $unique_phases[$name];
        }
        // amount of iterations (value) for each game (key)
        $ordered_phases = BasicHelper::reindexArray($temp);
        unset($temp);


        $this->designConfig = [
            'ordered_names' => $ordered_names,
            'ordered_phases' => $ordered_phases,
            'unique_names' => $unique_names,
            'unique_phases' => $unique_phases
        ];
    }


    /**
     * Loads the configuration for the bias types and values present in the design chain and bias chain.
     */
    private function loadBiasConfig()
    {
        // bias type (value) for each game (key)
        $ordered_types = BasicHelper::reindexArray(BasicHelper::parseChainLeft($this->rawCondition['design_chain']));
        $unique_types = BasicHelper::parseChainLeft($this->rawCondition['bias_chain']);


        $unique_values = array_combine(array_values($unique_types), array_values(BasicHelper::parseChainRight($this->rawCondition['bias_chain'])));


        $temp = [];
        foreach ($ordered_types as $type) {
            $temp[] = $unique_values[$type];
        }
        // percentage of bias (value) for each game (key)
        $ordered_values = BasicHelper::reindexArray($temp);
        unset($temp);


        $this->biasConfig = [
            'ordered_types' => $ordered_types,
            'ordered_values' => $ordered_values,
            'unique_types' => $unique_types,
            'unique_values' => $unique_values
        ];
    }


    /**
     * Must run after loadDesignConfig and loadBiasConfig. Loads the configuration for the bias ration per game.
     *
     * And.
     *
     * Loads the configuration for phases played within each game.
     * Each each game (key : int) contains the phases (value : array).
     * The phases array contains the phase order (key) and the PC behaviour (competitive | not competitive).
     * By default, if not randomized, competitive behaviour is at the top of the phases array.
     *
     */
    private function loadConditionConfig()
    {
        foreach ($this->designConfig['ordered_phases'] as $game_number => $phases)
        {
            // store the ratios ordered for each game number
            $this->conditionConfig['ordered_ratio'][$game_number] = ceil(($this->biasConfig['ordered_values'][$game_number] / 100) * $phases);

            // store the competitive behaviour ordered for each game and for each phase
            $ordered_competitive = array_fill(1, $this->conditionConfig['ordered_ratio'][$game_number], 1);
            $ordered_cooperative = array_fill($this->conditionConfig['ordered_ratio'][$game_number] + 1, $phases - $this->conditionConfig['ordered_ratio'][$game_number], 0);

            $this->conditionConfig['ordered_competitive'][$game_number] = $ordered_competitive + $ordered_cooperative;
        }
    }


    /**
     * Loads the configuration for the text associated with each bias type (e.g., comp)
     */
    private function loadConditionText()
    {
        $bias_type = BasicHelper::parseChainLeft($this->rawCondition['text_chain']);
        $text = BasicHelper::parseChainRight($this->rawCondition['text_chain']);

        // condition text (value) for each bias type (key)
        $this->conditionText = array_combine(array_values($bias_type), $text);
    }


    /**
     * Loads general info about the condition. Don't require special parsing.
     */
    private function loadConditionInfo()
    {
        $this->conditionInfo = [
            'id' => $this->rawCondition['id'],
            'name' => $this->rawCondition['name'],
            'title' => $this->rawCondition['title'],
            'opponent' => $this->rawCondition['opponent'],
            'random_games' => $this->rawCondition['random_design_chain'],
            'random_phases' => $this->rawCondition['random_design_iteration']
        ];
    }


    #endregion


    #region getters

    /**
     * Returns the full design configuration.
     *
     * @return array
     */
    public function getDesignConfig() : array
    {
        return $this->designConfig;
    }


    /**
     * Returns the full bias configuration.
     *
     * @return array
     */
    public function getBiasConfig() : array
    {
        return $this->biasConfig;
    }


    /**
     * Returns the full condition configuration.
     *
     * @return array
     */
    public function getConditionConfig() : array
    {
        return $this->conditionConfig;
    }


    /**
     * Returns the full raw condition data (as stored in the database).
     *
     * @return array
     */
    public function getRawCondition() : array
    {
        return $this->rawCondition;
    }


    /**
     * Returns the full condition info.
     *
     * @return array
     */
    public function getConditionInfo() : array
    {
        return $this->conditionInfo;
    }


    /**
     * Returns the full condition text.
     *
     * @return array
     */
    public function getConditionText() : array
    {
        return $this->conditionText;
    }

    #endregion
}
