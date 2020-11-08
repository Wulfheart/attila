<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content',
        'sent_at',
        'read_at',
        'global',
        'sending_power_id',
        'receiving_power_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'global' => 'boolean',
        'sending_power_id' => 'integer',
        'receiving_power_id' => 'integer',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'sent_at',
        'read_at',
    ];


    public function sendingPower()
    {
        return $this->belongsTo(\App\Models\Power::class);
    }

    public function receivingPower()
    {
        return $this->belongsTo(\App\Models\Power::class);
    }
}
