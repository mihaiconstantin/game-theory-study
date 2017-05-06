<?php

namespace App\Models;

use App\Helpers\DataArchiveHelper;
use Illuminate\Database\Eloquent\Model;


/**
 * @property mixed id
 * @property int ip
 * @property int code
 * @property int study_name
 * @property int study_time
 * @property int study_integrity
 * @property int condition_name
 * @property int opponent_name
 * @property int games_played
 * @property int game_phases_played
 * @property int practice_phases_played
 */
class DataParticipant extends Model
{
    protected $fillable = [
        'ip',
        'code',
        'study_name',
        'study_time',
        'study_integrity',
        'condition_name',
        'opponent_name',
        'games_played',
        'game_phases_played',
        'practice_phases_played'
    ];



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
     * Relationship with DataForm (child)
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function data_config()
    {
        return $this->hasOne('App\Models\DataConfig');
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
