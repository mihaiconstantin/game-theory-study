<?php

namespace App\Http\Controllers;

class InstructionController extends Controller
{

    public function __construct()
    {
        $this->middleware('consent')->except(['start', 'end']);
    }



    public function start()
    {
        return view('instruction', ['data' => $this->InstructionLoader('instruction.start')]);
    }


    public function end()
    {
        return view('end', ['data' => $this->InstructionLoader('instruction.end')]);
    }


    public function announcement()
    {
        return view('instruction', ['data' => $this->InstructionLoader('instruction.announcement')]);
    }


    public function practice()
    {
        $instruction = $this->InstructionLoader('instruction.practice');
        $instruction->url_parameters['gameNumber'] = 1;
        $instruction->url_parameters['phaseNumber'] = 1;
        return view('instruction', ['data' => $instruction]);
    }


    public function condition()
    {
        return view('instruction', ['data' => $this->InstructionLoader('instruction.condition')]);
    }


    public function newGame($gameNumber)
    {
        $instruction = $this->InstructionLoader('instruction.new-game');
        // TODO: change to array and correct url parameters
        $instruction->url_parameters['gameNumber'] = $gameNumber;
        $instruction->url_parameters['phaseNumber'] = 1;

        return view('instruction', [
            'data' => $instruction,
            'gameNumber' => $gameNumber
        ]);
    }


    public function debriefing()
    {
        return view('instruction', ['data' => $this->InstructionLoader('instruction.debriefing')]);
    }


    public function amazonCode()
    {
        return view('amazon', ['data' => $this->InstructionLoader('instruction.amazon-code')]);
    }

}


/**
 * TODO: Refactor the views from passing the values via properties to array keys.
 *
 */
































