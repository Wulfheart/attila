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
    ];


    public function variant()
    {
        return $this->belongsTo(\App\Models\Variant::class);
    }

    public function winningPower()
    {
        return $this->belongsTo(\App\Models\Power::class);
    }
}
