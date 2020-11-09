<?php

namespace App\Models;

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
    ];

    // Eloquent Accessors
    public function getStartedAttribute(): bool
    {
        return $this->phases()->count() > 0;
    }

    public function getCurrentPhaseAttribute(): Phase
    {
        return $this->phases()->orderByDesc('started_at')->first();
    }

    // Eloquent Query Scopes
    public function scopeNew($query)
    {
        // TODO
        return $query;
    }

    public function scopeActive($query)
    {
        // TODO
        return $query;
    }

    public function scopeFinished($query)
    {
        // TODO
        return $query;
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
