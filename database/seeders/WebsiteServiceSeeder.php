<?php

namespace Database\Seeders;

use App\Models\WebsiteService;
use Illuminate\Database\Seeder;

class WebsiteServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WebsiteService::factory()->count(6)->create();
    }
}
