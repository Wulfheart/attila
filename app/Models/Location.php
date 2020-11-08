<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'phase_id',
        'power_id',
        'name',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'phase_id' => 'integer',
        'power_id' => 'integer',
    ];


    public function phase()
    {
        return $this->belongsTo(\App\Models\Phase::class);
    }

    public function power()
    {
        return $this->belongsTo(\App\Models\Power::class);
    }
}
