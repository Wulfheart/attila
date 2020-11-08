<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Game;
use App\Models\Power;
use App\Models\Variant;
use Carbon\CarbonInterval;

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
        $variant = Variant::inRandomOrder()->first();
        return [
            'name' => $this->faker->catchPhrase,
            'variant_id' => $variant->id,
            'phase_length' => CarbonInterval::day()->totalSeconds,
            'scs_to_win' => $variant->default_scs_to_win,
            'player_count' => $variant->default_player_count,
            'winning_power_id' => null,
        ];
    }
}
