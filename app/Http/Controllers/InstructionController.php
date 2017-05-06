<?php

namespace App\Http\Controllers;


use App\Helpers\SessionHelper;

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

        $instruction['parameters']['gameNumber'] = 1;
        $instruction['parameters']['phaseNumber'] = 1;

        return view('instruction', ['data' => $instruction]);
    }


    public function condition()
    {
        return view('instruction', ['data' => $this->InstructionLoader('instruction.condition')]);
    }


    public function newGame($gameNumber)
    {
        $instruction = $this->InstructionLoader('instruction.new-game');

        $instruction['parameters']['gameNumber'] = $gameNumber;
        $instruction['parameters']['phaseNumber'] = 1;

        return view('instruction', ['data' => $instruction]);
    }


    public function debriefing()
    {
        return view('instruction', ['data' => $this->InstructionLoader('instruction.debriefing')]);
    }


    public function amazonCode()
    {
        $code = null;

        // The finish key here means that the user has responded the latest
        // game evaluation form, assuming that he honestly went through
        // all the games and phases. Therefore, we can provide him a
        // code as a result of his participation.

        if (session('temp.finish'))
        {
            session(['temp.study_end' => microtime()]);

            $code = session('storage.data_participants.code');
        }


        return view('amazon', [
            'data' => $this->InstructionLoader('instruction.amazon-code'),
            'code' => $code
        ]);
    }


    public function notAllowed()
    {
        dd(
          session()->all()
        );

        return view('end', ['data' => $this->InstructionLoader('instruction.not-allowed')]);
    }
    
}
