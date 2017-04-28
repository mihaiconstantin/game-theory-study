<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormElement extends Model
{
    public function select_options()
    {
        return $this->hasMany('App\Models\SelectOption');
    }
}
