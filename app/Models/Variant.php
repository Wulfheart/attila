<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'default_scs_to_win',
        'default_player_count',
        'api_name'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'default_scs_to_win' => 'integer',
        'default_player_count' => 'integer',
    ];

    public function basePowers() {
        return $this->hasMany(BasePower::class);
    }
}
