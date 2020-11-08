<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Message;
use App\Models\Power;

class MessageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Message::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'content' => $this->faker->paragraphs(3, true),
            'sent_at' => $this->faker->dateTime(),
            'read_at' => $this->faker->dateTime(),
            'global' => $this->faker->boolean,
            'sending_power_id' => Power::factory(),
            'receiving_power_id' => Power::factory(),
        ];
    }
}
