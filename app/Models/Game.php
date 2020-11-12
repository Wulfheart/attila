<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'variant_id',
        'phase_length',
        'winning_power_id',
        'scs_to_win',
        'player_count'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'variant_id' => 'integer',
        'winning_power_id' => 'integer',
        'scs_to_win' => 'integer',
        'player_count' => 'integer',
        'ended' => 'boolean'
    ];

    // Eloquent Accessors
    public function getStartedAttribute(): bool
    {
        return $this->phases()->count() > 0;
    }

    public function getCurrentPhaseAttribute(): Phase
    {
        return $this->phases()->orderByDesc('started_at')->with('nextPhase', 'previousPhase')->first();
    }

    // Eloquent Query Scopes
    public function scopeNew(Builder $query)
    {
        return $query->doesntHave('phases')->whereDoesntHave('powers', function (Builder $query) {
            $query->where('user_id', auth()->user()->id);
        });
    }

    public function scopeJoined(Builder $query)
    {
        $query->whereHas('powers', function (Builder $query) {
            $query->where('user_id', 1);
        })
            ->where('ended', false);
    }

    public function scopeActive(Builder $query)
    {
        return $query->where('ended', false)->has('phases'); //->whereNotNull('winning_power_id');
    }

    public function scopeFinished(Builder $query)
    {
        return $query->where('ended', true);
    }

    // Eloquent Relations
    public function variant()
    {
        return $this->belongsTo(\App\Models\Variant::class);
    }

    public function winningPower()
    {
        return $this->belongsTo(\App\Models\Power::class);
    }

    public function powers()
    {
        return $this->hasMany(Power::class);
    }

    public function phases()
    {
        return $this->hasMany(Phase::class);
    }
}
