<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemScale extends Model
{
    /**
     * Fetches all the steps associated with a particular questionnaire
     * (i.e., the Likert scale range)
     *
     * @param string $questionnaireName
     * @return mixed
     */
    public static function getScaleForQuestionnaire(string $questionnaireName)
    {
        return self::where('name', $questionnaireName)->orderBy('order')->pluck('text')->all();
    }
}
