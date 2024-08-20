<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'is_admin' => 0,
        ]);

        User::factory()->create([
            'name' => 'Root',
            'email' => 'root@example.com',
            'is_admin' => 1,
        ]);

        Category::factory(10)->create();
        Product::factory(100)->create();

    }
}
