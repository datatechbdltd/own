<?php

namespace Database\Seeders;

use App\Models\WebsiteSeo;
use Illuminate\Database\Seeder;

class WebsiteSeoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WebsiteSeo::factory()->count(3)->create();
    }
}
