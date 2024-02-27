<?php

namespace Database\Seeders;

use App\Models\banner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (count(banner::all()) == 0) {
            banner::create([
                "post" => "1",
            ]);
        }
    }
}
