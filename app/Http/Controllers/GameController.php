<?php

namespace App\Http\Controllers;

use App\Helpers\ConditionParserHelper;
use App\Helpers\BasicHelper;
use App\Helpers\DesignParserHelper;
use App\Helpers\SessionHelper;
use App\Models\Condition;
use App\Models\Design;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


class GameController extends Controller
{

    public function __construct()
    {
        $this->middleware('consent');
    }


    // to be passed to the play routes

    // condition_name
    // condition_text
    // condition_opponent

    // design_outcomes
    // design_label

    // game_number
    // phase_number
    // store_route


    public function playPractice($gameNumber, $phaseNumber)
    {
        // SessionHelper::setNextGameAndPhase('practice', $gameNumber, $phaseNumber);
        // dd(session('config'));

        return view('forms.game');
    }


    public function storePractice(Request $request)
    {
        dd($request->all());
    }


    public function playGame($gameNumber, $phaseNumber)
    {
        $total_games = null;
        $total_phases = null;

        $next_game = null;
        $next_phase = null;

        $cheats = 0;

        if (array_key_exists($gameNumber, session('config.condition.designs')))
        {
            if(array_key_exists($phaseNumber, session('config.condition.competitive')[$gameNumber]))
            {
                // good game & phase
                $total_games = count(session('config.' . 'condition' . '.designs'));
                $total_phases = session('config.' . 'condition' . '.phases.' . $gameNumber);


                // the four possible cases
                if ($gameNumber == $total_games && $phaseNumber == $total_phases)
                {
                    $next_game = 0;
                    $next_phase = 0;
                }
                elseif ($gameNumber == $total_games && $phaseNumber < $total_phases)
                {
                    $next_game = 0;
                    $next_phase = $phaseNumber + 1;
                }
                elseif ($gameNumber < $total_games && $phaseNumber == $total_phases)
                {
                    $next_game = $gameNumber + 1;
                    $next_phase = 1;
                }
                elseif ($gameNumber < $total_games && $phaseNumber < $total_phases)
                {
                    $next_game = $gameNumber;
                    $next_phase = $phaseNumber + 1;
                }

                session([
                    'temp.current_game' => $gameNumber,
                    'temp.current_phase' => $phaseNumber,
                    'temp.next_game' => $next_game,
                    'temp.next_phase' => $next_phase,
                    'temp.total_games' => $total_games,
                    'temp.total_phases' => $total_phases
                ]);

            }
            else
            {
                // bad phase
                $cheats = 1;
            }
        }
        else
        {
            // bad game
            $cheats = 1;
        }


        if ($cheats == 1)
        {
            // redirect to next correct game number and phase
            $next_game = session('temp.next_game');
            $next_phase = session('temp.next_phase');

            if (!$next_game || !$next_phase) {
                $next_game = 1;
                $next_phase = 1;
            }

            return redirect(route('game.play', [
                'gameNumber' => $next_game,
                'phaseNumber' => $next_phase
            ]));

        }


        // return normal
        return view('forms.game');


    }


    public function storeGame(Request $request)
    {
        // do something with the request
        // figure out the new redirect link
    }


    public function result($gameNumber, $phaseNumber)
    {
        return 'result/' . $gameNumber . '/' . $phaseNumber;
    }
}
