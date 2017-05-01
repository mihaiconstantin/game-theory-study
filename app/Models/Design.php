<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Design extends Model
{

    /**
     * Fetch specific columns from designs table by name.
     *
     * @param string $name
     * @param array $columns
     * @return array
     */
    public static function getByName(string $name, array $columns) : array {
        return self::where('name', $name)->select($columns)->first()->toArray();
    }

}