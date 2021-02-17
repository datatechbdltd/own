<?php

namespace Database\Seeders;

use App\Models\LeadService;
use Illuminate\Database\Seeder;

class LeadServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LeadService::factory()->count(3)->create();
    }
}
