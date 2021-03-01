<?php

namespace Database\Seeders;

use App\Models\WebsiteCounter;
use Illuminate\Database\Seeder;

class WebsiteCounterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WebsiteCounter::factory()->count(3)->create();
    }
}
