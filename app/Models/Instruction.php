<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Instruction extends Model
{
    /**
     * Fetch specific columns from instruction table using the current_url column for search.
     *
     * @param string $name
     * @param array $columns
     * @return array
     */
    public static function getColumnsByUrl(string $name, array $columns) : array {
        return self::where('current_url', $name)->select($columns)->first()->toArray();
    }

}