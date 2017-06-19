<?php

namespace App\Http\Controllers;


use App\Models\Condition;
use Mockery\Exception;

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
        switch ($condition)
        {
            case 'wallstreet':
                $user_gains = $user_score;
                $pc_gains = $pc_score;

                break;
            case 'community':
                $user_gains = ($user_score + $pc_score) / 2;
                $pc_gains = ($user_score + $pc_score) / 2;

                break;
            case 'point':
                $user_gains = (.75 * $user_score) + (.25 * $pc_score);
                $pc_gains = (.75 * $pc_score) + (.25 * $user_score);
                break;

            default:
                throw new \Exception('No score division logic specified for condition "' . $condition . '".');
                break;
        }


        // Fetch the appropriate text from the database.
        $text = Condition::where('name', $condition)->value('text_division');

        // Insert the score within the placeholders.
        $text = str_replace('{{user_gains}}', '<span class="badge .badge-pill badge-primary">' . $user_gains . '</span>', $text);
        $text = str_replace('{{pc_gains}}',   '<span class="badge .badge-pill badge-danger">'  . $pc_gains .   '</span>', $text);


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

}
