<?php

namespace App\Http\Controllers;


use App\Helpers\BasicHelper;
use App\Helpers\ConditionParserHelper;
use App\Helpers\SessionHelper;
use App\Models\Condition;
use App\Models\FormElement;
use App\Models\ItemScale;
use App\Models\PersonalityItem;

use App\Models\Study;
use Illuminate\Http\Request;

class FormController extends Controller
{

    /*
     * Display the consent form.
     * */
    public function consent()
    {
        $instruction = $this->InstructionLoader('form.consent');

        return view('forms.consent', [
            'data' => $instruction
        ]);
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
        $condition_name = BasicHelper::randomAssign(env('STUDY'));
        $practice_name = Study::getColumnsByName($study_name, ['practice'])['practice'];


        // build a session skeleton packed with config data only (i.e., [config])
        $skeleton = new SessionHelper($condition_name, $practice_name);


        // push the skeleton to the session
        session($skeleton->getSkeleton());


        // update relevant session keys

        // dd(
            // session()->all()
        // );

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
        // do something with the Request here
        return redirect(route($this->InstructionLoader('form.demographics')->next_url));
    }



    /*
     * Display and store the personality form.
     * */
    public function personality()
    {
        $instruction = $this->InstructionLoader('form.personality');
        $items = PersonalityItem::getItemsForQuestionnaire('hexaco');
        $steps = ItemScale::getScaleForQuestionnaire('hexaco');

        return view('forms.personality', [
            'data' => $instruction,
            'items' => $items,
            'steps' => $steps]);
    }

    public function storePersonality(Request $request)
    {
        // do something with the Request here

        return redirect(route($this->InstructionLoader('form.personality')->next_url));
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
        // do something with the request

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
        $items = PersonalityItem::getItemsForQuestionnaire('bfi');
        $steps = ItemScale::getScaleForQuestionnaire('bfi');

        return view('forms.game_question', [
            'data' => $instruction,
            'items' => $items,
            'steps' => $steps,
            'gameNumber' => $gameNumber]);
    }

    public function storeGameQuestion(Request $request)
    {
        // do something with the request

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
        // do something with the request

        return redirect(route($this->InstructionLoader('form.feedback')->next_url));
    }

}
