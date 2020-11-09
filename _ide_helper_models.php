<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\BasePower
 *
 * @property int $id
 * @property int $variant_id
 * @property string $color
 * @property string $name
 * @property string $api_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Variant $variant
 * @method static \Illuminate\Database\Eloquent\Builder|BasePower newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BasePower newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BasePower query()
 * @method static \Illuminate\Database\Eloquent\Builder|BasePower whereApiName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BasePower whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BasePower whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BasePower whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BasePower whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BasePower whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BasePower whereVariantId($value)
 */
	class BasePower extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Game
 *
 * @property int $id
 * @property string $name
 * @property int $variant_id
 * @property int $phase_length
 * @property int $scs_to_win
 * @property int $player_count
 * @property int|null $winning_power_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Phase $current_phase
 * @property-read bool $started
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Phase[] $phases
 * @property-read int|null $phases_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Power[] $powers
 * @property-read int|null $powers_count
 * @property-read \App\Models\Variant $variant
 * @property-read \App\Models\Power|null $winningPower
 * @method static \Illuminate\Database\Eloquent\Builder|Game active()
 * @method static \Illuminate\Database\Eloquent\Builder|Game finished()
 * @method static \Illuminate\Database\Eloquent\Builder|Game new()
 * @method static \Illuminate\Database\Eloquent\Builder|Game newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Game newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Game query()
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game wherePhaseLength($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game wherePlayerCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereScsToWin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereVariantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereWinningPowerId($value)
 */
	class Game extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Instruction
 *
 * @property int $id
 * @property int $location_id
 * @property string $payload
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Location $location
 * @method static \Illuminate\Database\Eloquent\Builder|Instruction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Instruction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Instruction query()
 * @method static \Illuminate\Database\Eloquent\Builder|Instruction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Instruction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Instruction whereLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Instruction wherePayload($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Instruction whereUpdatedAt($value)
 */
	class Instruction extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Location
 *
 * @property int $id
 * @property int $phase_id
 * @property int $power_id
 * @property int|null $instruction_id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Instruction[] $instructions
 * @property-read int|null $instructions_count
 * @property-read \App\Models\Instruction|null $movement
 * @property-read \App\Models\Phase $phase
 * @property-read \App\Models\Power $power
 * @method static \Illuminate\Database\Eloquent\Builder|Location newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Location newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Location query()
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereInstructionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location wherePhaseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location wherePowerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereUpdatedAt($value)
 */
	class Location extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Message
 *
 * @property int $id
 * @property string $content
 * @property \Illuminate\Support\Carbon $sent_at
 * @property \Illuminate\Support\Carbon|null $read_at
 * @property bool $global
 * @property int $sending_power_id
 * @property int|null $receiving_power_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Power|null $receivingPower
 * @property-read \App\Models\Power $sendingPower
 * @method static \Illuminate\Database\Eloquent\Builder|Message newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Message newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Message query()
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereGlobal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereReadAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereReceivingPowerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereSendingPowerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereSentAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereUpdatedAt($value)
 */
	class Message extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Phase
 *
 * @property int $id
 * @property int $game_id
 * @property int|null $previous_phase_id
 * @property string $name
 * @property \Illuminate\Support\Carbon $started_at
 * @property \Illuminate\Support\Carbon|null $ended_at
 * @property int $length
 * @property string|null $svg_adjudicated
 * @property string|null $svg_with_orders
 * @property string $state
 * @property bool $adjudicated
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Game $game
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Location[] $locations
 * @property-read int|null $locations_count
 * @property-read Phase|null $previousPhase
 * @method static \Illuminate\Database\Eloquent\Builder|Phase newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Phase newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Phase query()
 * @method static \Illuminate\Database\Eloquent\Builder|Phase whereAdjudicated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Phase whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Phase whereEndedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Phase whereGameId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Phase whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Phase whereLength($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Phase whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Phase wherePreviousPhaseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Phase whereStartedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Phase whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Phase whereSvgAdjudicated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Phase whereSvgWithOrders($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Phase whereUpdatedAt($value)
 */
	class Phase extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PhasePowerData
 *
 * @property int $id
 * @property int $phase_id
 * @property int $power_id
 * @property int $unit_count
 * @property int $supply_center_count
 * @property int $build_count
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Phase $phase
 * @property-read \App\Models\Power $power
 * @method static \Illuminate\Database\Eloquent\Builder|PhasePowerData newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PhasePowerData newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PhasePowerData query()
 * @method static \Illuminate\Database\Eloquent\Builder|PhasePowerData whereBuildCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhasePowerData whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhasePowerData whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhasePowerData wherePhaseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhasePowerData wherePowerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhasePowerData whereSupplyCenterCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhasePowerData whereUnitCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhasePowerData whereUpdatedAt($value)
 */
	class PhasePowerData extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Power
 *
 * @property int $id
 * @property int $base_power_id
 * @property int $user_id
 * @property int $game_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\BasePower $basePower
 * @property-read \App\Models\Game $game
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Location[] $locations
 * @property-read int|null $locations_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Power newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Power newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Power query()
 * @method static \Illuminate\Database\Eloquent\Builder|Power whereBasePowerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Power whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Power whereGameId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Power whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Power whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Power whereUserId($value)
 */
	class Power extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property string|null $remember_token
 * @property int|null $current_team_id
 * @property string|null $profile_photo_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Game[] $games
 * @property-read int|null $games_count
 * @property-read string $profile_photo_url
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCurrentTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProfilePhotoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorRecoveryCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Variant
 *
 * @property int $id
 * @property string $name
 * @property string $api_name
 * @property int $default_scs_to_win
 * @property int $default_player_count
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BasePower[] $basePowers
 * @property-read int|null $base_powers_count
 * @method static \Illuminate\Database\Eloquent\Builder|Variant newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Variant newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Variant query()
 * @method static \Illuminate\Database\Eloquent\Builder|Variant whereApiName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variant whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variant whereDefaultPlayerCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variant whereDefaultScsToWin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variant whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variant whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variant whereUpdatedAt($value)
 */
	class Variant extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Vote
 *
 * @property int $id
 * @property int $game_id
 * @property string $voted
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Game $game
 * @method static \Illuminate\Database\Eloquent\Builder|Vote newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Vote newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Vote query()
 * @method static \Illuminate\Database\Eloquent\Builder|Vote whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vote whereGameId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vote whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vote whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vote whereVoted($value)
 */
	class Vote extends \Eloquent {}
}

