<?php

namespace Database\Seeders;

use App\Models\emailCampaign;
use Illuminate\Database\Seeder;

class EmailCampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        emailCampaign::factory()->count(2)->create();
    }
}
