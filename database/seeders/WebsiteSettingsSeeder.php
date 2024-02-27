<?php

namespace Database\Seeders;

use App\Models\WebsiteSettings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WebsiteSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (count(WebsiteSettings::all()) == 0) {
            WebsiteSettings::create([
                "name" => "TMC",
                "email" => "info@tmc.com",
                "phone" => "+91 9658 9658",
                "logo" => "logo.png",
                "favicon" => "favicon.ico",
                "author" => "https://nexusolutions.netlify.app",
                "title" => "Welcome to TCM.",
                "description" => base64_encode("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque id elementum purus, non placerat mi. In blandit justo eu lorem malesuada molestie. Cras at ligula molestie, sollicitudin orci sit amet, eleifend elit. Donec scelerisque venenatis neque, in tempor massa convallis ornare. Praesent sed ante dui. Maecenas pulvinar aliquam ultricies. Mauris accumsan gravida arcu vel rutrum. Ut molestie eros et dui condimentum, ut egestas ante ornare. Cras interdum commodo ligula at egestas. Nullam id velit fermentum, accumsan sem ut, convallis massa. Nullam vitae luctus lectus."),
                "website_address" => "90-120 Swanston Street, Karachi VIC 3000 National relay service 133 677 (ask for +91 9658 9658)",
                "keywords" => "Karachi,sindh,pakistan",
                "facebook_link" => "www.facebook.com",
                "twitter_link" => "https://twitter.com/",
                "instagram_link" => "www.instagram.com",
                "linkedin_link" => "https://www.linkedin.com/",
                "youtube_link" => "https://www.youtube.com/",
            ]);
        }
    }
}
