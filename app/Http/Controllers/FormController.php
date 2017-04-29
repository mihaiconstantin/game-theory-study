<?php

namespace App\Http\Controllers;

use App\Models\FormElement;
use App\Models\ItemScale;
use App\Models\PersonalityItem;

use Illuminate\Http\Request;

class FormController extends Controller
{

    /*
     * Display and store the demographics form.
     * */
    public function demographics()
    {
        $elements = FormElement::with(array(
            'select_options' => function($query) {
                $query->orderBy('order');
            }))
            ->where('current_url', 'form.demographic')
            ->orderBy('order')
            ->get();
        $instruction = $this->InstructionLoader('form.demographics');

        return view('forms.demographics', [
            'data' => $instruction,
            'elements' => $elements
            ]);
    }

    public function storeDemographics(Request $request)
    {
        // do something with the Request here
        return redirect(route($this->InstructionLoader('form.demographics')->next_url, ['name' => 'hexaco']));
    }


    /*
     * Display and store the personality form.
     * */
    public function personality($name)
    {
        $instruction = $this->InstructionLoader('form.personality');
        $items = PersonalityItem::getItemsForQuestionnaire($name);
        $steps = ItemScale::getScaleForQuestionnaire($name);

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



    public function expectation()
    {
        return 'guess';
    }

    public function gameQuestion($gameNumber)
    {
        return 'gameQuestion' . $gameNumber;
    }

    public function experimentFeedback()
    {
        return 'experimentFeedback';
    }

}
