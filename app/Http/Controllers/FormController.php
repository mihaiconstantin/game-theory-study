<?php

namespace App\Http\Controllers;


use App\Helpers\BasicHelper;
use App\Helpers\SessionHelper;
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
        // check if the user agreed to participate
        if ((int) $request['consent'] == 0)
        {
            return redirect(route('instruction.end'));
        }


        // prepare general variables to initialize the session storage
        $study_name = env('STUDY');
        $condition_name = BasicHelper::randomAssign($study_name);
        $practice_name = Study::getColumnsByName($study_name, ['practice'])['practice'];


        // build a session skeleton packed with config data only (i.e., ['config'])
        $skeleton = new SessionHelper($condition_name, $practice_name);


        // push the skeleton to the session
        session($skeleton->getSkeleton());


        // update relevant session keys
        session([
            'temp.consent' => true,
            'temp.study_start' => microtime(),
            'temp.passed_practice' => 0,

            'storage.data_participants.ip' => $request->ip(),
            'storage.data_participants.code' => BasicHelper::userCode(),
            'storage.data_participants.study_name' => $study_name,
            'storage.data_participants.study_time' => microtime(),
            'storage.data_participants.condition_name' => $condition_name
        ]);


        return redirect(route($this->InstructionLoader('form.consent')->next_url));
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
        return redirect(route($this->InstructionLoader('form.demographics')->next_url, ['name' => 'hexaco']));
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
        return redirect(route($this->InstructionLoader('form.questionnaire')->next_url));
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

        return redirect(route($this->InstructionLoader('form.expectation')->next_url, [
            'gameNumber' => '1',
            'phaseNumber' => '1'
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

        return redirect(route($this->InstructionLoader('form.game-question')->next_url, [
            'gameNumber' => '1'
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

        return redirect(route($this->InstructionLoader('form.feedback')->next_url));
    }

}
