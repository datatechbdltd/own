<?php

namespace Database\Factories;

use App\Models\WebsiteSeo;
use Illuminate\Database\Eloquent\Factories\Factory;

class WebsiteSeoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WebsiteSeo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
//            'icon'   => $this->faker->name,
            'text' => $this->faker->text,
//            'is_active'  => $this->faker->boolean,
        ];
    }
}
