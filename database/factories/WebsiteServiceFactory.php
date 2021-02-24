<?php

namespace Database\Factories;

use App\Models\WebsiteService;
use Illuminate\Database\Eloquent\Factories\Factory;

class WebsiteServiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WebsiteService::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'              => $this->faker->name,
//            'slug'              => $this->faker->slug,
            'short_description' => $this->faker->text,
            'long_description'  => $this->faker->text,
//            'url'               => $this->faker->url,
            'agreement'         => $this->faker->text,
        ];
    }
}
