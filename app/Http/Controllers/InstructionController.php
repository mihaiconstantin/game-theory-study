<?php

namespace App\Http\Controllers;

use App\Models\Instruction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InstructionController extends Controller
{
    public function start()
    {
        $instruction = DB::table('instructions')->where('current_url', 'instruction/start')->first();
        return view('instruction', compact('instruction'));
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
