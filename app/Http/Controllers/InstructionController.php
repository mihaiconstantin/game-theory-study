<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InstructionController extends Controller
{

    /**
     * Fetches an App\Models\Instruction object from the database
     * using the $current_url as a search phrase
     *
     * @param string $current_url
     * @param string $table
     * @return mixed
     */
    protected function InstructionLoader(string $current_url, string $table = 'instructions')
    {
        $instruction = DB::table($table)->where('current_url', $current_url)->first();
        $instruction->url_parameters = [];
        return $instruction;
    }

    # # #

    public function start()
    {
        return view('instruction', ['instruction' => $this->InstructionLoader('instruction.start')]);
    }

    public function gameOverviewOne()
    {
        return view('instruction', ['instruction' => $this->InstructionLoader('instruction.game-overview-one')]);
    }

    public function practice()
    {
        $instruction = $this->InstructionLoader('instruction.practice');
        $instruction->url_parameters['gameNumber'] = 1;
        $instruction->url_parameters['phaseNumber'] = 2;
        return view('instruction', ['instruction' => $instruction]);
    }

    public function gameOverviewTwo()
    {
        return view('instruction', ['instruction' => $this->InstructionLoader('instruction.game-overview-two')]);
    }

    public function endGame($gameNumber)
    {
        $instruction = $this->InstructionLoader('instruction.end-game');
        $instruction->url_parameters['gameNumber'] = $gameNumber;
        return view('instruction', ['instruction' => $instruction]);
    }

    public function newGame($gameNumber)
    {
        $instruction = $this->InstructionLoader('instruction.new-game');
        $instruction->url_parameters['gameNumber'] = $gameNumber;
        $instruction->url_parameters['phaseNumber'] = 1;
        return view('instruction', ['instruction' => $instruction]);
    }

    public function amazonCode()
    {
        return view('instruction', ['instruction' => $this->InstructionLoader('instruction.amazon-code')]);
    }

}
