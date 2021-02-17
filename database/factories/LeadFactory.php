<?php

namespace Database\Factories;

use App\Models\Lead;
use Illuminate\Database\Eloquent\Factories\Factory;

class LeadFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lead::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'add_by_id'     =>  $this->faker->numberBetween(1, 50),
            'update_by_id'  =>  $this->faker->numberBetween(1, 50),
            'category_id'   =>  $this->faker->numberBetween(1, 50),
            'service_id'    =>  $this->faker->numberBetween(1, 50),
            'district_id'   =>  $this->faker->numberBetween(1, 50),
            'thana_id'  =>  $this->faker->numberBetween(1, 50),
            'name'  =>  $this->faker->name,
            'email'     =>  $this->faker->email,
            'phone'     =>  $this->faker->phoneNumber,
            'date_of_birth'     =>  $this->faker->date(),
            'gender'    =>  $this->faker->boolean,
            'is_married'    =>  $this->faker->boolean,
            'company_name'  =>  $this->faker->company,
            'profession'    =>  $this->faker->name,
            'address'   =>  $this->faker->address,
            'company_website'   =>  $this->faker->name,
            'company_facebook_page'     =>  $this->faker->name,
            'description'   =>  $this->faker->text,
        ];
    }
}
