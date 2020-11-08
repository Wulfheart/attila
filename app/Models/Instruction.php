<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instruction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'power_id',
        'location_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'power_id' => 'integer',
        'location_id' => 'integer',
    ];


    public function power()
    {
        return $this->belongsTo(\App\Models\Power::class);
    }

    public function location()
    {
        return $this->belongsTo(\App\Models\Location::class);
    }
}
