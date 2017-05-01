<?php

namespace App\Http\Controllers;

use App\Helpers\ConditionParserHelper;
use App\Helpers\BasicHelper;
use App\Models\Condition;
use App\Models\Design;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function play($gameNumber, $phaseNumber)
    {
        $c = new ConditionParserHelper(Condition::getCondition('community'));
        $a = $c->relevantSummary();
        var_dump($a);


        /*$melted_data = array(
            'label' => 'points',
            'game_score' => 123,
            'current_game' => $gameNumber,
            'total_games' => 9,
            'current_iteration' => $phaseNumber,
            'total_iterations' => 10,
            'visibility' => true,
            'condition_name' => 'Wall Street',
            'condition_description' => 'Als jij voor Optie 1 kiest en de andere speler kiest voor Optie 2, zul jij 12 geldeenheden krijgen en de andere speler 8 geldeenheden. Als de andere speler echter ook voor Optie 1 kiest, krijgen jullie allebei 4 geldeenheden. Als je voor Optie 2 kiest en de andere speler kiest voor Optie 1, zal de andere speler de 12 geldeenheden krijgen en jij 8 geldeenheden. Als de andere speler echter ook voor Optie 2 kiest, zullen jullie allebei 1 geldeenheid krijgen.',
            'condition_opponent' => 'Robin',
            'design_outcome' => array(
                '1#1' => '+80#+80',
                '1#2' => '-20#+40',
                '2#1' => '+40#-20',
                '2#2' => '+5#+5'
            )
        );*/
        // return view('forms.play')->with($melted_data);
    }













    public function storePlay(Request $request)
    {
        // do something with the request
        // figure out the new redirect link
        dd($request->all());
    }

    public function result($gameNumber, $phaseNumber)
    {
        return 'result/' . $gameNumber . '/' . $phaseNumber;
    }
}
