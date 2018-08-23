<?php
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Condition
 *
 * @property int $id
 * @property string $name
 * @property string $design_chain
 * @property string $bias_chain
 * @property string $text_chain
 * @property string|null $text_division
 * @property int $random_design_iteration
 * @property int $random_design_chain
 * @property string $title
 * @property string $opponent
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Condition whereBiasChain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Condition whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Condition whereDesignChain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Condition whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Condition whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Condition whereOpponent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Condition whereRandomDesignChain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Condition whereRandomDesignIteration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Condition whereTextChain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Condition whereTextDivision($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Condition whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Condition whereUpdatedAt($value)
 */
	class Condition extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\DataConfig
 *
 * @property mixed config
 * @property int $id
 * @property int $data_participant_id
 * @property string $config
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\DataParticipant $data_participant
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DataConfig whereConfig($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DataConfig whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DataConfig whereDataParticipantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DataConfig whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DataConfig whereUpdatedAt($value)
 */
	class DataConfig extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\DataForm
 *
 * @property int $id
 * @property int $data_participant_id
 * @property string $demographic
 * @property string $expectation
 * @property string $feedback
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\DataParticipant $data_participant
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DataForm whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DataForm whereDataParticipantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DataForm whereDemographic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DataForm whereExpectation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DataForm whereFeedback($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DataForm whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DataForm whereUpdatedAt($value)
 */
	class DataForm extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\DataGamePhase
 *
 * @property int $id
 * @property int $data_participant_id
 * @property string $phase_context
 * @property int $game_number
 * @property int $phase_number
 * @property string $play_time
 * @property string $bias_type
 * @property int $competitive
 * @property int $user_choice
 * @property int $pc_choice
 * @property int $user_outcome
 * @property int $pc_outcome
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\DataParticipant $data_participant
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DataGamePhase whereBiasType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DataGamePhase whereCompetitive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DataGamePhase whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DataGamePhase whereDataParticipantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DataGamePhase whereGameNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DataGamePhase whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DataGamePhase wherePcChoice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DataGamePhase wherePcOutcome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DataGamePhase wherePhaseContext($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DataGamePhase wherePhaseNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DataGamePhase wherePlayTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DataGamePhase whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DataGamePhase whereUserChoice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DataGamePhase whereUserOutcome($value)
 */
	class DataGamePhase extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\DataParticipant
 *
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
 * @property int $id
 * @property string $ip
 * @property string $code
 * @property string $study_name
 * @property string $study_time
 * @property string $condition_name
 * @property int $game_phases_played
 * @property int $practice_phases_played
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\DataConfig $data_config
 * @property-read \App\Models\DataForm $data_form
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\DataGamePhase[] $data_game_phases
 * @property-read \App\Models\DataQuestionnaire $data_questionnaire
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DataParticipant whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DataParticipant whereConditionName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DataParticipant whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DataParticipant whereGamePhasesPlayed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DataParticipant whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DataParticipant whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DataParticipant wherePracticePhasesPlayed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DataParticipant whereStudyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DataParticipant whereStudyTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DataParticipant whereUpdatedAt($value)
 */
	class DataParticipant extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\DataQuestionnaire
 *
 * @property int $id
 * @property int $data_participant_id
 * @property string $personality
 * @property string $game_question
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\DataParticipant $data_participant
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DataQuestionnaire whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DataQuestionnaire whereDataParticipantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DataQuestionnaire whereGameQuestion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DataQuestionnaire whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DataQuestionnaire wherePersonality($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DataQuestionnaire whereUpdatedAt($value)
 */
	class DataQuestionnaire extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Design
 *
 * @property int $id
 * @property string $name
 * @property int $iterations
 * @property string $competitive_option
 * @property string $outcome_1_value
 * @property string $outcome_2_value
 * @property string $outcome_3_value
 * @property string $outcome_4_value
 * @property string $label
 * @property string $outcome_1_description
 * @property string $outcome_2_description
 * @property string $outcome_3_description
 * @property string $outcome_4_description
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Design whereCompetitiveOption($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Design whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Design whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Design whereIterations($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Design whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Design whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Design whereOutcome1Description($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Design whereOutcome1Value($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Design whereOutcome2Description($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Design whereOutcome2Value($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Design whereOutcome3Description($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Design whereOutcome3Value($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Design whereOutcome4Description($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Design whereOutcome4Value($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Design whereUpdatedAt($value)
 */
	class Design extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\FormElement
 *
 * @property int $id
 * @property string $current_url
 * @property string $name
 * @property int $order
 * @property string $tag_type
 * @property string $attr_name
 * @property string $attr_id
 * @property string $label
 * @property string|null $attr_type
 * @property string|null $attr_placeholder
 * @property string|null $attr_value
 * @property string|null $attr_class
 * @property string|null $attr_min
 * @property string|null $attr_max
 * @property int|null $attr_required
 * @property int|null $attr_autocomplete
 * @property int|null $attr_disabled
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\SelectOption[] $select_options
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FormElement whereAttrAutocomplete($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FormElement whereAttrClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FormElement whereAttrDisabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FormElement whereAttrId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FormElement whereAttrMax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FormElement whereAttrMin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FormElement whereAttrName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FormElement whereAttrPlaceholder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FormElement whereAttrRequired($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FormElement whereAttrType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FormElement whereAttrValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FormElement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FormElement whereCurrentUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FormElement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FormElement whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FormElement whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FormElement whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FormElement whereTagType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FormElement whereUpdatedAt($value)
 */
	class FormElement extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Instruction
 *
 * @property int $id
 * @property string $current_url
 * @property string $next_url
 * @property string $title
 * @property string $text
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Instruction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Instruction whereCurrentUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Instruction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Instruction whereNextUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Instruction whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Instruction whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Instruction whereUpdatedAt($value)
 */
	class Instruction extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ItemScale
 *
 * @property int $id
 * @property int $order
 * @property string $name
 * @property string $text
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ItemScale whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ItemScale whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ItemScale whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ItemScale whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ItemScale whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ItemScale whereUpdatedAt($value)
 */
	class ItemScale extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PersonalityItem
 *
 * @property int $id
 * @property int $order
 * @property string $name
 * @property string $text
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PersonalityItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PersonalityItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PersonalityItem whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PersonalityItem whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PersonalityItem whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PersonalityItem whereUpdatedAt($value)
 */
	class PersonalityItem extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SelectOption
 *
 * @property int $id
 * @property int $form_element_id
 * @property int $order
 * @property string $value
 * @property string $text
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\FormElement $form_element
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SelectOption whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SelectOption whereFormElementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SelectOption whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SelectOption whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SelectOption whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SelectOption whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SelectOption whereValue($value)
 */
	class SelectOption extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Study
 *
 * @property int $id
 * @property string $name
 * @property string $condition_set
 * @property string $practice
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Study whereConditionSet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Study whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Study whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Study whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Study wherePractice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Study whereUpdatedAt($value)
 */
	class Study extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\StudyLoader
 *
 * @property int $id
 * @property string $load_study
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudyLoader whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudyLoader whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudyLoader whereLoadStudy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudyLoader whereUpdatedAt($value)
 */
	class StudyLoader extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property int|null $role_id
 * @property string $name
 * @property string $email
 * @property string|null $avatar
 * @property string $password
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

