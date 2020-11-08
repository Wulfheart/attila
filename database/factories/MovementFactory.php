<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Instruction;
use App\Models\Movement;
use App\Models\Phase;
use App\Models\Power;

class MovementFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Movement::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'power_id' => Power::factory(),
            'phase_id' => Phase::factory(),
            'instruction_id' => Instruction::factory(),
        ];
    }
}
