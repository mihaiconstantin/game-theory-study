<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstructionController extends Controller
{

    public function __construct()
    {
        $this->middleware('consent')->except(['start', 'end', 'amazonCode', 'notAllowed']);
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
        // marking the end of the experiment <- useful for InstructionController@storeConsent

        $code = null;

        if (session('temp.consent'))
        {
            session([
                'temp.finish' => true,
                'temp.study_end' => microtime()
            ]);

            $code = session('storage.data_participants.code');
        }

        return view('amazon', [
            'data' => $this->InstructionLoader('instruction.amazon-code'),
            'code' => $code
        ]);
    }


    public function notAllowed()
    {
        return view('end', ['data' => $this->InstructionLoader('instruction.not-allowed')]);
    }
    
}


/**
 * TODO: Refactor the views from passing the values via properties to array keys.
 *
 */
































