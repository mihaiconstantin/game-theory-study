<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function demographics()
    {
        return 'demographics';
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
