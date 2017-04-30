<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataParticipant extends Model
{

    /**
     * Relationship with DataForm (child)
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function data_form()
    {
        return $this->hasOne('App\Models\DataForm');
    }


    /**
     * Relationship with DataQuestionnaire (child
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function data_questionnaire()
    {
        return $this->hasOne('App\Models\DataQuestionnaire');
    }


    /**
     * Relationship with DataGamePhases (child)
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function data_game_phases()
    {
        return $this->hasMany('App\Models\DataGamePhase');
    }

}
