<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Mr. Admin';
        $user->email = 'admin@gmail.com';
        $user->phone = '01304734623';
        $user->password = Hash::make('password');
        $user->save();
    }
}
