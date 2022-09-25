<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

        \App\Models\User::create([
            'name' => 'Yusril Sidik',
            'username' => 'admin',
            'email' => 'admin@dampasan.com',
            'password' =>'123456',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
