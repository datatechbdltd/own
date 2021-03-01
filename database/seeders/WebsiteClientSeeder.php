<?php

namespace Database\Seeders;

use App\Models\WebsiteClient;
use Illuminate\Database\Seeder;

class WebsiteClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WebsiteClient::factory()->count(5)->create();
    }
}
