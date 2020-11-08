<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Game;
use App\Models\Phase;

class PhaseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Phase::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'game_id' => Game::factory(),
            'name' => $this->faker->name,
            'starts_at' => $this->faker->dateTime(),
            'length' => $this->faker->numberBetween(-10000, 10000),
            'adjudicated' => $this->faker->boolean,
        ];
    }
}
