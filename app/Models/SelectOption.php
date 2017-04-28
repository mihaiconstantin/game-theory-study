<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SelectOption extends Model
{
    public function form_element()
    {
        return $this->belongsTo('App\Models\FormElement');
    }
}
