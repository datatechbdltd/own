<?php

namespace Database\Factories;

use App\Models\WebsiteBanner;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class WebsiteBannerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WebsiteBanner::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'         => $this->faker->name,
            'highlight'     => $this->faker->name,
            'description'   => $this->faker->name,
            'btn_url'       => 'http://google.com/',
            'video_url'     => 'http://google.com/',
            'image'         => 'uploads/images/demo-image.png',
            'color'         => 'http://google.com/',
        ];
    }
}
