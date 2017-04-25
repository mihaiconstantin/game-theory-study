<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
    public function play($gameNumber, $phaseNumber)
    {
        return 'play/' . $gameNumber . '/' . $phaseNumber;
    }

    public function result($gameNumber, $phaseNumber)
    {
        return 'result/' . $gameNumber . '/' . $phaseNumber;
    }
}
