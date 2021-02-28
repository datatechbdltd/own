<?php

namespace Database\Seeders;

use App\Models\OfflinePaymentMethod;
use Illuminate\Database\Seeder;

class OfflinePaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OfflinePaymentMethod::factory()->count(3)->create();
    }
}
