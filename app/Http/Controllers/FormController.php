<?php

namespace App\Http\Controllers;

use App\Models\FormElement;
use App\Models\SelectOption;

use Illuminate\Http\Request;

class FormController extends Controller
{

    public function demographics()
    {
        $elements = FormElement::with('select_options')->where('current_url', 'form.demographic')->get();
        $instruction = $this->InstructionLoader('form.demographics');

        return view('forms.demographics', [
            'data' => $instruction,
            'elements' => $elements
            ]);
    }

    public function storeDemographics(Request $request)
    {
        // do something with the Request here
        dd($request->all());

        // return redirect(route($this->InstructionLoader('form.demographics')->next_url));
    }


    public function hexaco()
    {
        $instruction = $this->InstructionLoader('form.hexaco');

        $questionnaire = array(
            'items' => array(
                1 => 'Item 1',
                2 => 'Item 2',
                3 => 'Item 3',
                4 => 'Item 4',
                5 => 'Item 5',
                6 => 'Item 5',
                7 => 'Item 5',
                8 => 'Item 5',
                9 => 'Item 5',
                10 => 'Item 5',
                11 => 'Item 5',
            ),
            'scale' => array(
                'Welkom in het volgende',
                'Welkom in het volgende',
                'Welkom in het volgende',
                'Welkom in het volgende',
                'Welkom in het volgende',
            )
        );






        return view('forms.hexaco', [
            'data' => $instruction,
            'hexaco' => (object) $questionnaire]);
    }

    public function storeHexaco()
    {
        return 'hexaco stored';
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
