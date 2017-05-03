<?php

namespace App\Helpers;


use Illuminate\Http\Request;

class GameViewDataHelper
{
    public static function playViewData() : string
    {
        $playViewData = [
            'condition_name' => '',
            'condition_text' => '',
            'condition_opponent' => '',

            'design_outcomes' => '',
            'design_label' => '',

            'game_number' => '',
            'phase_number' => ''
        ];


        // return $playViewData;


    }


    public static function resultViewData() : array
    {
    }


    public static function scoreViewData() : array
    {
    }
}


    // {{$route_name == 'practice.play' ? 'practice.store' : 'game.store'}}
