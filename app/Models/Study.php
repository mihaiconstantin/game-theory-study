<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Study extends Model
{

    /**
     * Fetches a study associated with a particular name.
     *
     * @param string $name
     * @return mixed
     */
    public static function getStudy(string $name)
    {
        return self::where('name', $name)->first()->toArray();
    }

}