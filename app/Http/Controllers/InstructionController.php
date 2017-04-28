<?php

namespace App\Http\Controllers;

class InstructionController extends Controller
{

    public function start()
    {
        return view('instruction', ['data' => $this->InstructionLoader('instruction.start')]);
    }

    public function gameOverviewOne()
    {
        return view('instruction', ['data' => $this->InstructionLoader('instruction.game-overview-one')]);
    }

    public function practice()
    {
        $instruction = $this->InstructionLoader('instruction.practice');
        $instruction->url_parameters['gameNumber'] = 1;
        $instruction->url_parameters['phaseNumber'] = 2;
        return view('instruction', ['data' => $instruction]);
    }

    public function gameOverviewTwo()
    {
        return view('instruction', ['data' => $this->InstructionLoader('instruction.game-overview-two')]);
    }

    public function endGame($gameNumber)
    {
        $instruction = $this->InstructionLoader('instruction.end-game');
        $instruction->url_parameters['gameNumber'] = $gameNumber;
        return view('instruction', ['data' => $instruction]);
    }

    public function newGame($gameNumber)
    {
        $instruction = $this->InstructionLoader('instruction.new-game');
        $instruction->url_parameters['gameNumber'] = $gameNumber;
        $instruction->url_parameters['phaseNumber'] = 1;
        return view('instruction', ['data' => $instruction]);
    }

    public function amazonCode()
    {
        return view('instruction', ['data' => $this->InstructionLoader('instruction.amazon-code')]);
    }

}


































