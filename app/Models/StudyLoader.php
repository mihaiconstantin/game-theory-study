<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudyLoader extends Model
{
    /**
     * Fetch the study name loaded for the current research.
     *
     * @return string
     */
    public static function getLoadedStudy() : string {
        return self::all()->pluck('load_study')->first();
    }

}
