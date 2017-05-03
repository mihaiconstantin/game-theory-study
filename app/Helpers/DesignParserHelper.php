<?php

namespace App\Helpers;


class DesignParserHelper
{
    private $rawDesign;

    private $designOutcome;
    private $designText;
    private $designInfo;


    function __construct($rawDesign)
    {
        $this->rawDesign = $rawDesign;

        $this->loadDesignOutcome();
        $this->loadDesignText();
        $this->loadDesignInfo();
    }


    #region configuration loaders

    /**
     * Parses the raw design outcomes into option#option (key) and outcome#outcome (value).
     * This format is then handled down in the partial view _play.blade.php.
     */
    private function loadDesignOutcome()
    {
        $temp_1 = explode(';', $this->rawDesign['outcome_1_value']);
        $temp_2 = explode(';', $this->rawDesign['outcome_2_value']);
        $temp_3 = explode(';', $this->rawDesign['outcome_3_value']);
        $temp_4 = explode(';', $this->rawDesign['outcome_4_value']);

        $this->designOutcome = [
            $temp_1[0] => $temp_1[1],
            $temp_2[0] => $temp_2[1],
            $temp_3[0] => $temp_3[1],
            $temp_4[0] => $temp_4[1]
        ];

        unset($temp_1, $temp_2, $temp_3, $temp_4);
    }


    /**
     * Parses the raw design descriptions into option#option (key) and text#text (value).
     * This format is then handled down in the partial view _play.blade.php.
     */
    private function loadDesignText()
    {
        $temp_1 = explode(';', $this->rawDesign['outcome_1_description']);
        $temp_2 = explode(';', $this->rawDesign['outcome_2_description']);
        $temp_3 = explode(';', $this->rawDesign['outcome_3_description']);
        $temp_4 = explode(';', $this->rawDesign['outcome_4_description']);

        $this->designText = [
            $temp_1[0] => $temp_1[1],
            $temp_2[0] => $temp_2[1],
            $temp_3[0] => $temp_3[1],
            $temp_4[0] => $temp_4[1]
        ];

        unset($temp_1, $temp_2, $temp_3, $temp_4);
    }


    /**
     * Loads general info about the design. Does not require special parsing.
     */
    private function loadDesignInfo()
    {
        $this->designInfo = [
            'id' => $this->rawDesign['id'],
            'name' => $this->rawDesign['name'],
            'phases' => $this->rawDesign['iterations'],
            'label' => $this->rawDesign['label']
        ];
    }

    #endregion



    /**
     * Return only the relevant design configuration for the session.
     *
     * @return array
     */
    public function relevantSummary() : array
    {
        return [
            'outcomes' => $this->designOutcome,
            'text' => $this->designText,
            'info' => $this->designInfo
        ];
    }



    #region getters

    /**
     * Returns the full raw design array.
     *
     * @return array
     */
    public function getRawDesign() : array
    {
        return $this->rawDesign;
    }


    /**
     * Returns the full design outcome array.
     *
     * @return array
     */
    public function getDesignOutcome() : array
    {
        return $this->designOutcome;
    }


    /**
     * Returns the full design descriptions array.
     *
     * @return array
     */
    public function getDesignText() : array
    {
        return $this->designText;
    }


    /**
     * Returns the full design info array.
     *
     * @return array
     */
    public function getDesignInfo() : array
    {
        return $this->designInfo;
    }

    #endregion

}

/**
 * TODO: Unify the Condition and Design parsers under a common interface.
 *
 */