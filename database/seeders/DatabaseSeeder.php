<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(StaticOptionSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(WebsiteBannerSeeder::class);
        $this->call(SocialLinkSeeder::class);
        $this->call(WebsiteSeoSeeder::class);
        $this->call(WebsiteServiceSeeder::class);
        $this->call(LeadCategorySeeder::class);
        $this->call(LeadDistrictSeeder::class);
        $this->call(LeadServiceSeeder::class);
        $this->call(LeadSeeder::class);
    }
}
