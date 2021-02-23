<?php

namespace Database\Factories;

use App\Models\WebsiteTeam;
use Illuminate\Database\Eloquent\Factories\Factory;

class WebsiteTeamFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WebsiteTeam::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'        => $this->faker->name,
            'designation' => $this->faker->name,
            'slug'  => $this->faker->slug,
            'serial'      => $this->faker->numberBetween(1, 10),
        ];
    }
}
