<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataGamePhase extends Model
{

    protected $fillable = [
        'phase_context',
        'game_number',
        'phase_number',
        'play_time',
        'incentive',
        'bias_type',
        'competitive',
        'user_choice',
        'pc_choice',
        'user_outcome',
        'pc_outcome'
    ];


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
