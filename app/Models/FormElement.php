<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormElement extends Model
{
    /**
     * Defining relationship with select_options table.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function select_options()
    {
        return $this->hasMany('App\Models\SelectOption');
    }


    /**
     * Fetches the form elements and their children (only the cause of select elements)
     * using the current_url as an indicator of the context.
     *
     * @param string $current_url
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function getElementForContext(string $current_url)
    {
        return self::with(array(
            'select_options' => function($query) {
                $query->orderBy('order');
            }))
        ->where('current_url', $current_url)
        ->orderBy('order')
        ->get();
    }

}
