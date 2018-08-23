<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataQuestionnaire extends Model
{

    protected $fillable = ['game_question', 'game_opponent_evaluation', 'study_evaluation'];


    /**
     * Relationship with parent DataParticipant.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function data_participant()
    {
        return $this->belongsTo('App\Models\DataParticipant');
    }
}
