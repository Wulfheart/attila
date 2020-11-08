<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Phase;
use App\Models\PhasePowerData;
use App\Models\Power;

class PhasePowerDataFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PhasePowerData::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'phase_id' => Phase::factory(),
            'power_id' => Power::factory(),
            'unit_count' => $this->faker->numberBetween(-10000, 10000),
            'supply_center_count' => $this->faker->numberBetween(-10000, 10000),
            'build_count' => $this->faker->numberBetween(-10000, 10000),
        ];
    }
}
