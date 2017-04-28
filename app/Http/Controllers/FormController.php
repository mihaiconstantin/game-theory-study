<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use stdClass;

class FormController extends Controller
{
    public function demographics()
    {
        $data = new stdClass;
        $data->title = 'title';
        $data->text = 'text';

        return view('forms.demographics', ['data' => $data]);

    }

    public function storeDemographics(Request $request)
    {
        dd($request->all());
//        return 'Stored with love, in the deepest of all';
    }


    public function hexaco()
    {
        return 'hexaco';
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
