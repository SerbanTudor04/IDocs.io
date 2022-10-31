<?php

namespace Database\Seeders;

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

        // \App\Models\User::factory()->create([
        //     'name' => 'admin',
        //     'username' => 'admin',
        //     'email' => 'admin@example.com',
        //     'password' => bcrypt('admin'),
        // ]);

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
            'url' => 'documents.add_comment',
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
