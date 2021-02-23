<?php

namespace Database\Seeders;

use App\Models\WebsiteTeam;
use Illuminate\Database\Seeder;

class WebsiteTeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WebsiteTeam::factory()->count(6)->create();
    }
}
