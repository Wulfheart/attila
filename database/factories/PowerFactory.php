<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\BasePower;
use App\Models\Game;
use App\Models\Power;
use App\Models\User;

class PowerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Power::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'base_power_id' => BasePower::factory(),
            'user_id' => User::factory(),
            'game_id' => Game::factory(),
        ];
    }
}
