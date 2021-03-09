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
        $user->assignRole('admin');

        $user = new User();
        $user->name = 'Mr. Employee';
        $user->email = 'employee@gmail.com';
        $user->phone = '01304734624';
        $user->password = Hash::make('password');
        $user->save();
        $user->assignRole('employee');

        $user = new User();
        $user->name = 'Mr. Marketer';
        $user->email = 'marketer@gmail.com';
        $user->phone = '01304734625';
        $user->password = Hash::make('password');
        $user->save();
        $user->assignRole('marketer');

        $user = new User();
        $user->name = 'Mr. Customer';
        $user->email = 'customer@gmail.com';
        $user->phone = '01304734626';
        $user->password = Hash::make('password');
        $user->save();
        $user->assignRole('customer');
    }
}
