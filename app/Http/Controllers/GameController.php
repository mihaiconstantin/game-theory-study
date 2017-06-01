<?php

namespace App\Http\Controllers;

use App\Helpers\SessionHelper;
use Illuminate\Http\Request;


class GameController extends Controller
{

    public function __construct()
    {
        $this->middleware('consent');
    }



    public function play($gameNumber, $phaseNumber)
    {
        // Given the context <- comparison will be carried within the practice | condition storage container.

        $context = session('temp.passed_practice') ? 'condition' : 'practice';


        // We also switch the score display on.

        if ($context == 'condition' && !session('temp.show_score'))
        {
            session(['temp.show_score' => true]);
        }


        // Since the next game and phase parameters are determined on the POST request
        // triggered by this page, first check if the session has non-null values.
        //
        // If the values are null, it means that this should be the first game,
        // however, still check the URL to make sure the request comes from
        // gameNumber = 1 and phaseNumber = 1 and safely allow the form.
        //
        // If the values are not null, it means that this is probably not the
        // first game. Thus, we want to check if the URL parameters match
        // what is expect (i.e., they must match the next parameters)
        // determined on the previous POST request. If they match,
        // safely allow the form.

        if (session('temp.next_game') && session('temp.next_phase'))
        {
            // The parameters match the ones determined on the previous POST request.

            if ($gameNumber == session('temp.next_game') && $phaseNumber == session('temp.next_phase'))
            {
                $data = SessionHelper::fetchGameViewData($context, $gameNumber, $phaseNumber);

                // Fetch the score view result if the user is not in the practice context.

                if ($context == 'condition')
                {
                    $data = array_merge($data, SessionHelper::fetchScoreViewData($gameNumber));
                }

                return view('forms.game', ['data' => $data]);
            }


            // Redirect to the session parameters for the reason that those were set
            // on the previous POST request, hence, what was next there, here is
            // current. Therefore, this page should be at parameters indicated
            // by the session parameters.

            return redirect(route('game.play', [
                'gameNumber' => session('temp.next_game'),
                'phaseNumber' => session('temp.next_phase')
            ]));

        }


        // The session is not set, so check if this is the first game and phase.

        if ($gameNumber == 1 && $phaseNumber == 1)
        {
            $data = SessionHelper::fetchGameViewData($context, $gameNumber, $phaseNumber);

            // Fetch the score view result if the user is not in the practice context.

            if ($context == 'condition')
            {
                $data = array_merge($data, SessionHelper::fetchScoreViewData($gameNumber));
            }

            return view('forms.game', ['data' => $data]);
        }


        // The session is not set and the user tries to already jump ahead, so set him to the beginning.

        return redirect(route('game.play', [
            'gameNumber' => 1,
            'phaseNumber' => 1
        ]));

    }


    public function store(Request $request)
    {
        // Given the context <- comparison will be carried within the practice | condition storage container.

        $context = session('temp.passed_practice') ? 'condition' : 'practice';


        $parameter = SessionHelper::whereNext($context, session('_previous.url'));


        // At this point we know whether the game page for which the post request came from a valid URL.
        //
        // If the $game_number or $phase_number are null, it means that they are out of normal bounds.
        // In this case we want to check the session for the last successfully determined numbers.
        // We will then redirect to the game play with those numbers as URL parameters values.
        // If the session keys for next game and phase are null it means that the games did
        // not yet start, and we set the URL parameters for the next GET request to 1/1.
        //
        // However, if the numbers are correct, then we want to determine the next valid numbers
        // for the parameters and store them to the session. On the next game request we will
        // check to see if the parameters provided match the ones in the session. If not,
        // we redirect to the parameters from the session and we can show a message.


        if ($parameter['current_game'] && $parameter['current_phase'])
        {
            // Store the data (config and request) to the storage container

            $data = SessionHelper::fillGameResult($context, $parameter['current_game'], $parameter['current_phase'], $request);

            $base_key = 'storage.data_' . $context . '.' . $parameter['current_game'] . '.' . $parameter['current_phase'];

            session([
                $base_key . '.game_number'       => $data['game_number'],
                $base_key . '.phase_number'      => $data['phase_number'],
                $base_key . '.start_play_time'   => $data['start_play_time'],
                $base_key . '.end_play_time'     => $data['end_play_time'],
                $base_key . '.bias_type'         => $data['bias_type'],
                $base_key . '.competitive'       => $data['competitive'],
                $base_key . '.user_choice'       => $data['user_choice'],
                $base_key . '.pc_choice'         => $data['pc_choice'],
                $base_key . '.user_outcome'      => $data['user_outcome'],
                $base_key . '.pc_outcome'        => $data['pc_outcome']
            ]);


            // Update the score at the right game number key if the context is condition.

            if ($context == 'condition')
            {
                session([
                    'score.' . $parameter['current_game'] . '.user' => session('score')[$parameter['current_game']]['user'] + $data['user_outcome'],
                    'score.' . $parameter['current_game'] . '.pc' => session('score')[$parameter['current_game']]['pc'] + $data['pc_outcome']
                ]);
            }


            // Update the session with the next URL values, but, before check to
            // make sure that the context doesn't need to be updated from
            // practice to condition.

            session([
                'temp.next_game' => $parameter['next_game'],
                'temp.next_phase' => $parameter['next_phase']
            ]);

            if ($context == 'practice' && $parameter['next_game'] == 0)
            {
                session([
                    'temp.passed_practice' =>  true,
                    'temp.next_game' => null,
                    'temp.next_phase' => null
                ]);

                // Tell result that it's time for the one-time very specific condition he expects.

                $request->session()->flash('blink', 'practice_is_over');
            }


            // The parameters are okay so keep iterating over the phases... <- showing results.

            return redirect(route('game.result', [
                'gameNumber' => $parameter['current_game'],
                'phaseNumber' => $parameter['current_phase'],
            ]));

        }


        // The parameters are spurious.

        return redirect(route('game.play', [
            'gameNumber' => session('temp.next_game') ?? 1,
            'phaseNumber' => session('temp.next_phase') ?? 1
        ]));

    }


    public function result($gameNumber, $phaseNumber)
    {
        $link = 'game.play';
        $parameters = ['gameNumber' => session('temp.next_game'), 'phaseNumber' => session('temp.next_phase')];


        // Link to the game question route only if the a game came to an end and
        // if practice phase has been passed already completed. If it passed
        // then we want to build another link that goes to the condition.
        // When building this link we need to reflect specific logic,
        // otherwise the link will always be passed down the view
        // since the is true condition will always hold true.

        if (($gameNumber < session('temp.next_game') || (!is_null(session('temp.next_game')) && session('temp.next_game') == 0 )) && session('temp.passed_practice'))
        {
            $link = 'instruction.score';
            $parameters = ['gameNumber' => $gameNumber];
        }

        // A very specific one-time condition to link to instruction.condition route.

        if (session('blink') == 'practice_is_over')
        {
            $link = 'instruction.condition';
            $parameters = [];
        }


        // Determine the right context for which the data is fetched.
        // By default we assume we are in the condition context.

        $context = 'condition';

        if (!session('temp.passed_practice') || session('blink'))
        {
            $context = 'practice';
        }


        // Preparing the data that will be passed down to the view.

        $data = SessionHelper::fetchResultViewData($context, $gameNumber, $phaseNumber);
        $data['next_url'] = $link;
        $data['parameters'] = $parameters;


        // Check if we need to fetch the score view data.

        if ($context == 'condition')
        {
            $score = SessionHelper::fetchScoreViewData($gameNumber);
            $data = array_merge($data, $score);
        }

        return view('result', ['data' => $data]);

    }

}

/**
 * TODO: Refactor the play and store routes in smarter way. There is quite a bit of anti-DRY.
 *
 */