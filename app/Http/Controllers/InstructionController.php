<?php

namespace App\Http\Controllers;


use App\Models\Condition;


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


    public function score($gameNumber)
    {
        // Determine the condition played and compute the score division based on the maximum score
        // obtained by the user or the computer. Glue the resulted division to the text variable.
        $condition = session('config.condition.info.name');

        // Determining what the user and the pc obtained.
        $user_score = session('score.' . $gameNumber . '.user');
        $pc_score = session('score.' . $gameNumber . '.pc');

        // Determining what the user and the pc gain.
        $gains = $this->adjustScoreForCondition($condition, $user_score, $pc_score);

        // Fetch the appropriate text from the database.
        $text = Condition::where('name', $condition)->value('text_division');

        // Insert the score within the placeholders.
        $text = str_replace('{{user_gains}}', '<span class="badge .badge-pill badge-primary">' . $gains['user'] . '</span>', $text);
        $text = str_replace('{{pc_gains}}',   '<span class="badge .badge-pill badge-danger">'  . $gains['pc'] .   '</span>', $text);


        // Fetch the text associated with this instruction view. Then attach
        // the modified text to the data passed down to the view. End by
        // preparing the remaining parameters.
        // TODO: it is redundant to have an instruction loader here
        //       since we already store the text in the database
        //       table that represents the conditions. Maybe
        //       it only helps with the URLs & the title.
        $instruction = $this->InstructionLoader('instruction.score');

        $instruction['text'] = $text;
        $instruction['parameters']['gameNumber'] = $gameNumber;


        return view('instruction', ['data' => $instruction]);
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




    /**
     * Computes and returns the proper score after applying the division rules.
     * Todo: place this somewhere else later.
     *
     * @param $condition
     * @param $user_score
     * @param $pc_score
     * @return array
     * @throws \Exception
     */
    function adjustScoreForCondition($condition, $user_score, $pc_score)
    {
        $score_gains = [
            'user' => null,
            'pc' => null
        ];

        if ($condition == 'B1' || $condition == 'B2' || $condition == 'D1' || $condition == 'D2' || $condition == 'F1' || $condition == 'F2') {
            $score_gains['user'] = $user_score;
            $score_gains['pc'] = $pc_score;
        }
        elseif ($condition == 'A1' || $condition == 'A2' || $condition == 'C1' || $condition == 'C2' || $condition == 'E1' || $condition == 'E2') {
            $score_gains['user'] = ($user_score + $pc_score) / 2;
            $score_gains['pc'] = ($user_score + $pc_score) / 2;
        }
        elseif ($condition == 'G1' || $condition == 'G2' || $condition == 'H1' || $condition == 'H2') {
            $score_gains['user'] = $user_score;
            $score_gains['pc'] = $pc_score;
        }
        else {
            throw new \Exception('No score division logic specified for condition "' . $condition . '".');
        }

        return $score_gains;
    }

}
