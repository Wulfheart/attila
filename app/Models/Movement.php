<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'power_id',
        'phase_id',
        'instruction_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'power_id' => 'integer',
        'phase_id' => 'integer',
        'instruction_id' => 'integer',
    ];


    public function power()
    {
        return $this->belongsTo(\App\Models\Power::class);
    }

    public function phase()
    {
        return $this->belongsTo(\App\Models\Phase::class);
    }

    public function instruction()
    {
        return $this->belongsTo(\App\Models\Instruction::class);
    }
}
