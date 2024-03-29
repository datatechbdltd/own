<?php

namespace Database\Factories;

use App\Models\smsCampaign;
use Illuminate\Database\Eloquent\Factories\Factory;

class SmsCampaignFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = smsCampaign::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'created_by_id' => $this->faker->numberBetween(1,10),
            'category_id' => $this->faker->numberBetween(1,10),
            'message' => $this->faker->text(50),
            'repeat' => $this->faker->numberBetween(1, 10),
        ];
    }
}
