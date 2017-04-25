<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstructionController extends Controller
{
    public function start()
    {
        return 'start';
    }

    public function gameOverviewOne()
    {
        return 'gameOverviewOne';
    }

    public function practice()
    {
        return 'practice';
    }

    public function gameOverviewTwo()
    {
        return 'gameOverviewTwo';
    }

    public function endGame($gameNumber)
    {
        return 'endGame' . $gameNumber;
    }

    public function newGame($gameNumber)
    {
        return 'newGame' . $gameNumber;
    }

    public function amazonCode()
    {
        return 'amazonCode';
    }

}
