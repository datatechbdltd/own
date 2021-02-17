<?php

namespace Database\Seeders;

use App\Models\LeadDistrict;
use Illuminate\Database\Seeder;

class LeadDistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LeadDistrict::factory()->count(3)->create();
    }
}
