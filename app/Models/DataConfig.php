<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataConfig extends Model
{
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
