<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phase extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'game_id',
        'previous_phase_id',
        'name',
        'started_at',
        'ended_at',
        'length',
        'adjudicated',
        'svg_adjudicated',
        'svg_with_orders',
        'state'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'game_id' => 'integer',
        'previous_phase_id' => 'integer',
        'adjudicated' => 'boolean',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'started_at',
        'ended_at',
    ];

    public function previousPhase(){
        return $this->belongsTo(Phase::class, 'previous_phase_id');
    }

    public function game()
    {
        return $this->belongsTo(\App\Models\Game::class);
    }
}
