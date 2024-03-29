<?php

namespace Database\Factories;

use App\Models\WebsiteProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

class WebsiteProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WebsiteProduct::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'        => $this->faker->name,
            'slug' => $this->faker->slug,
            'serial'  => $this->faker->numberBetween(1, 10),
            'price'  => $this->faker->numberBetween(1, 1000),
            'short_description'  => $this->faker->text(),
            'status'  => true,
        ];
    }
}
