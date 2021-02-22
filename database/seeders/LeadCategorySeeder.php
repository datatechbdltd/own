<?php

namespace Database\Seeders;

use App\Models\LeadCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\Request;

class LeadCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LeadCategory::factory()->count(2)->create();
    }



}
