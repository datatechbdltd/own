<?php

namespace Database\Seeders;

use App\Models\WebsiteProduct;
use Illuminate\Database\Seeder;

class WebsiteProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WebsiteProduct::factory()->count(6)->create();
    }
}
