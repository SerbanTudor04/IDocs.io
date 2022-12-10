<?php

namespace Database\Seeders;
use Illuminate\Support\Str;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Models\Apps::create([
            'id' => 1,
            'name' => 'iDocs.io',
        
        ]);


        // admin user create
        $admin_id=Str::uuid()->toString();
        

        \App\Models\User::create([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => 'admin',
            'app_id' => 1,
            'id' =>$admin_id,
            'is_staff' =>true,
        ]);

        \App\Models\AdminStaffGroups::create([
            'id' => 1,
            'description' => 'Full access',
            'app_id' => 1,
        ]);

        \App\Models\AdminStaffMemberships::create([
            'id'=>Str::uuid()->toString(),
            'group_id' => 1,
            'users_id' =>$admin_id,
        ]);

        \App\Models\AdminStaffPermissions::create([
            'id' => 1,
            'description' => 'Grant all permissions',
            'code' => 'P001'
        ]);

        \App\Models\AdminStaffPermissions::create([
            'id' => 2,
            'description' => 'Give access to delete documents',
            'code' => 'P002'
        ]);

        \App\Models\AdminStaffPermissions::create([
            'id' => 3,
            'description' => 'Give access to delete users',
            'code' => 'P003'
        ]);

        \App\Models\AdminStaffPermissions::create([
            'id' => 4,
            'description' => 'Give access to create applications',
            'code' => 'P004'
        ]);

        \App\Models\AdminStaffPermissions::create([
            'id' => 5,
            'description' => 'Give access to create users',
            'code' => 'P005'
        ]);

        \App\Models\AdminStaffPermissions::create([
            'id' => 6,
            'description' => 'Give access to delete applications',
            'code' => 'P006'
        ]);

        \App\Models\AdminStaffPermissions::create([
            'id' => 7,
            'description' => 'Give access to create applications links',
            'code' => 'P007'
        ]);

        \App\Models\AdminStaffPermissions::create([
            'id' => 8,
            'description' => 'Give access to delete applications links',
            'code' => 'P008'
        ]);

        \App\Models\AdminStaffGroupsPermissionsRelationship::create([
            'group_id' =>1,
            'permission_id' =>1
        ]);


        // end of admin user create
        


        \App\Models\AppLinks::create([
            'app_id' => 1,
            'id'=>1,
            'name' => 'Home',
            'url' => 'home.index',
            'icon' => 'fa fa-home',
        ]);
        \App\Models\AppLinks::create(
        [
            'app_id' => 1,
            'id'=>1,
            'name' => 'Search',
            'url' =>'home.results',
            'icon' => 'fa fa-search']);
        \App\Models\AppLinks::create(
        [
            'app_id' => 1,
            'id'=>1,
            'name' => 'Add Documentation',
            'url' => 'documents.add_show',
            'icon' => 'fa fa-plus'
        ]);
        \App\Models\AppLinks::create(
        [
            'app_id' => 1,
            'id'=>1,
            'name' => 'About (soon)',
            'url' => 'home.about',
            'icon' => 'fa fa-info'
        ]
        );
    }
}
