<?php

namespace Database\Factories;

use App\Models\WebsiteCounter;
use Illuminate\Database\Eloquent\Factories\Factory;

class WebsiteCounterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WebsiteCounter::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'              => $this->faker->name,
            'number'  => $this->faker->numberBetween(10000,20000),
        ];
    }
}
