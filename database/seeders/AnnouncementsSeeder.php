<?php

namespace Database\Seeders;

use App\Models\Announcement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnnouncementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (count(Announcement::all()) == 0) {
            Announcement::create([
                "title" => "Karachi News",
                "description" => "Saddar is a commercial and residential area in the heart of Karachi, known for its bustling markets, shops, and historical landmarks. If you have a specific question or need information about a particular aspect of TMC Saddar or any recent developments, I recommend contacting local authorities or conducting an online search for the most up-to-date information.",
                "is_publish" => "publish", 
            ]);
        }
    }
}
