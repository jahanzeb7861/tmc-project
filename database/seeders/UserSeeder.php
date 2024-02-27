<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (count(User::all()) == 0) {
            User::create([
                "first_name" => "Mustafa",
                "last_name" => "Ghouri",
                "email" => "admin@gmail.com",
                "password" => Hash::make("admin123"),
                "role" => "admin",
                "status" => "active",
            ]);
        }
    }
}
