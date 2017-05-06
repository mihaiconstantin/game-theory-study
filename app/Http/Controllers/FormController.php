<?php

namespace App\Http\Controllers;


use App\Helpers\BasicHelper;
use App\Helpers\SessionHelper;
use App\Models\DataConfig;
use App\Models\DataParticipant;
use App\Models\FormElement;
use App\Models\ItemScale;
use App\Models\PersonalityItem;

use App\Models\Study;
use Illuminate\Http\Request;

class FormController extends Controller
{

    public function __construct()
    {
        $this->middleware('consent')->except(['consent', 'storeConsent']);
    }


    /*
     * Display the consent form.
     * */
    public function consent()
    {
        $instruction = $this->InstructionLoader('form.consent');

        return view('forms.consent', ['data' => $instruction]);
    }


    /*
     * Display and store the demographics form.
     * */
    public function storeConsent(Request $request)
    {
        // Determine if the user agreed to participate or if
        // he is trying to participate again too soon < 2h.

        if ((int) $request['consent'] == 0)
        {
            return redirect()->route('instruction.end');
        }
        elseif (session('temp.finish'))
        {
            return redirect()->route('instruction.not-allowed');
        }


        // Prepare the general variables needed to initialize the session storage process.

        $study_name = env('STUDY');
        $condition_name = BasicHelper::randomAssign($study_name);
        $practice_name = Study::getColumnsByName($study_name, ['practice'])['practice'];


        // Build a session skeleton packed with config data only (i.e., ['config']).
        // This might be a good place to initialize a new DataParticipant model
        // and store the config data to the database. Immediately after that,
        // push the auto-generated id to session so later we can use the
        // Eloquent relationships to store the remaining data easily.

        $skeleton = new SessionHelper($condition_name, $practice_name);


        // Push the skeleton to the session.

        session($skeleton->getSkeleton());


        // Instantiate a new Eloquent DataParticipant object to
        // store the config and push the id to session. Don't
        // mind about the data_participant fields, those
        // will be bulk inserted later.

        $dataParticipant = new DataParticipant();

        $dataParticipant->ip = $request->ip();
        $dataParticipant->code = BasicHelper::userCode();
        $dataParticipant->study_name = $study_name;
        $dataParticipant->study_time = 0;
        $dataParticipant->study_integrity = 0;
        $dataParticipant->condition_name = $condition_name;
        $dataParticipant->opponent_name = $skeleton->getSkeleton()['config']['condition']['info']['opponent'];
        $dataParticipant->games_played = 0;
        $dataParticipant->game_phases_played = 0;
        $dataParticipant->practice_phases_played = 0;

        // Save the parent object to the database.

        $dataParticipant->save();

        // Prepare the config config child.

        $dataConfig = new DataConfig();
        $dataConfig->config = json_encode($skeleton->getSkeleton()['config']);

        // Store the child associated to the parent.

        $dataParticipant->data_config()->save($dataConfig);


        // Update whatever session keys are relevant to be updated now.
        // Make sure to store the id of the newly constructed model,
        // as we will use it later to append data via Eloquent.

        session([
            'temp.consent' => true,
            'temp.study_start' => microtime(),
            'temp.passed_practice' => false,

            'storage.data_participants.id' => $dataParticipant->id,
            'storage.data_participants.ip' => $dataParticipant->ip,
            'storage.data_participants.code' => $dataParticipant->code,
            'storage.data_participants.study_name' => $study_name,
            'storage.data_participants.condition_name' => $condition_name
        ]);


        // Send the redirect. The user has successfully started the experiment.

        return redirect(route($this->InstructionLoader('form.consent')['next_url']));
    }


    /*
     * Display and store the demographics form.
     * */
    public function demographics()
    {
        $elements = FormElement::getElementForContext('form.demographics');
        $instruction = $this->InstructionLoader('form.demographics');

        return view('forms.demographics', [
            'data' => $instruction,
            'elements' => $elements
            ]);
    }

    public function storeDemographics(Request $request)
    {
        SessionHelper::pushSerialized($request, 'storage.data_forms.demographic', ['_token']);

        return redirect(route($this->InstructionLoader('form.demographics')['next_url'], ['name' => 'hexaco']));
    }


    /*
     * Display and store the personality form.
     * */
    public function questionnaire($name)
    {
        $instruction = $this->InstructionLoader('form.questionnaire');
        $items = PersonalityItem::getItemsForQuestionnaire($name);
        $steps = ItemScale::getScaleForQuestionnaire($name);

        return view('forms.questionnaire', [
            'data' => $instruction,
            'items' => $items,
            'steps' => $steps,
            'name' => $name
        ]);
    }

    public function storeQuestionnaire(Request $request)
    {
        SessionHelper::pushSerialized($request, 'storage.data_questionnaires.' . request('_questionnaire'), ['_token']);

        if (request('_questionnaire') == 'hexaco')
        {
            return redirect(route('form.questionnaire', ['name' => 'bfi']));
        }

        return redirect(route('instruction.announcement'));
    }


    /*
     * Display and store the expectation form.
     * */
    public function expectation()
    {
        $instruction = $this->InstructionLoader('form.expectation');
        $elements = FormElement::getElementForContext('form.expectation');

        return view('forms.expectation', [
            'data' => $instruction,
            'elements' => $elements
        ]);
    }

    public function storeExpectation(Request $request)
    {
        SessionHelper::pushSerialized($request, 'storage.data_forms.expectation', ['_token']);

        session(['temp.passed_practice' => true]);

        return redirect(route($this->InstructionLoader('form.expectation')['next_url'], [
            'gameNumber' => 1,
            'phaseNumber' => 1
        ]));
    }


    /*
     * Display and store the game-question/{gameNumber} form.
     * */
    public function gameQuestion($gameNumber)
    {
        $instruction = $this->InstructionLoader('form.game-question');
        $items = PersonalityItem::getItemsForQuestionnaire('game_question');
        $steps = ItemScale::getScaleForQuestionnaire('game_question');

        return view('forms.game_question', [
            'data' => $instruction,
            'items' => $items,
            'steps' => $steps,
            'gameNumber' => $gameNumber,
            'name' => 'game_question'
        ]);
    }

    public function storeGameQuestion(Request $request)
    {
        SessionHelper::pushSerialized($request, 'storage.data_questionnaires.' . request('_questionnaire') . '.' . request('_game_number'), ['_token']);

        // if there are no games left redirect to debriefing
        if (session('temp.next_game') == 0)
        {
            // It's fair enough to mark the study as finished, because he just
            // answered the last game evaluation, meaning that we only want
            // him to answer a feedback form and it's over. However, this
            // isn't as important, and it can be skipped.

            session(['temp.finish' => true]);


            return redirect()->route('instruction.debriefing');
        }

        return redirect(route($this->InstructionLoader('form.game-question')['next_url'], [
            'gameNumber' => session('temp.next_game')
        ]));
    }


    /*
     * Display and store the feedback form.
     * */
    public function feedback()
    {
        $instruction = $this->InstructionLoader('form.feedback');
        $elements = FormElement::getElementForContext('form.feedback');

        return view('forms.feedback', [
            'data' => $instruction,
            'elements' => $elements
        ]);
    }

    public function storeFeedback(Request $request)
    {
        SessionHelper::pushSerialized($request, 'storage.data_forms.feedback', ['_token']);

        return redirect(route($this->InstructionLoader('form.feedback')['next_url']));
    }

}
