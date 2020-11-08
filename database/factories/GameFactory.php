<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Game;
use App\Models\Power;
use App\Models\Variant;

class GameFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Game::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'variant_id' => Variant::factory(),
            'phase_length' => $this->faker->numberBetween(-10000, 10000),
            'winning_power_id' => Power::factory(),
        ];
    }
}
