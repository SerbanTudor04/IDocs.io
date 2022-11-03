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



        \App\Models\User::create([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => 'admin',
            'app_id' => 1,
            'id' => Str::uuid()->toString(),
            'is_staff' =>true,
        ]);

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
