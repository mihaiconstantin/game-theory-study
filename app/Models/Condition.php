<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{

    /**
     * Fetches a condition associated with a particular name.
     *
     * @param string $name
     * @return mixed
     */
    public static function getCondition(string $name)
    {
        return self::where('name', $name)->first()->toArray();
    }

}