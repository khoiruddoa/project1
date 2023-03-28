<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'phone_number' => '0123',
            'password' => bcrypt('password'),
            'address' => 'tangerang',
            'role' => '3'

        ]);
        User::create([
            'name' => 'owner',
            'email' => 'owner@gmail.com',
            'phone_number' => '00',
            'password' => bcrypt('password'),
            'address' => 'tangerang',
            'role' => '4'

        ]);

        Category::create([
            'category_name' => '1. Kardus',
            'uom' => 'kg'],[
            'category_name' => '',
            'uom' => 'kg'],
        
        
        );
    }
}
