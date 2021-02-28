<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'employee']);
        Role::create(['name' => 'marketer']);
        Role::create(['name' => 'customer']);

//        User::find(1)->assignRole('admin');
//        User::find(2)->assignRole('employee');
//        User::find(3)->assignRole('marketer');
//        User::find(4)->assignRole('customer');


        $admin= Role::find(1);
        $employee= Role::find(2);
        $marketer = Role::find(3);
        $customer = Role::find(4);

        //admin_dashboard
        $permission = Permission::create(['name' => 'admin_dashboard']);
        $admin->givePermissionTo($permission);

        //application_setting
        $permission = Permission::create(['name' => 'application_setting']);
        $admin->givePermissionTo($permission);

        //lead_collect_from_website
        $permission = Permission::create(['name' => 'lead_collect_from_website']);
        $marketer->givePermissionTo($permission);

        //store_lead
        $permission = Permission::create(['name' => 'store_lead']);
        $marketer->givePermissionTo($permission);

        //import_lead
        $permission = Permission::create(['name' => 'import_lead']);
        $marketer->givePermissionTo($permission);
        $admin->givePermissionTo($permission);

        //import_lead_with_category
        $permission = Permission::create(['name' => 'import_lead_with_category']);
        $admin->givePermissionTo($permission);
    }
}
