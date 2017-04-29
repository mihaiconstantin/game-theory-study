<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonalityItem extends Model
{
    /**
     * Fetches all the items associated with a particular questionnaire.
     *
     * @param string $questionnaireName
     * @return mixed
     */
    public static function getItemsForQuestionnaire(string $questionnaireName)
    {
        return self::where('name', $questionnaireName)->orderBy('order')->pluck('text')->all();
    }
}
