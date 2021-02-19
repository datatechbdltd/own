<?php

namespace Database\Seeders;

use App\Models\smsCampaign;
use Illuminate\Database\Seeder;

class SmsCampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        smsCampaign::factory()->count(10)->create();
    }
}
