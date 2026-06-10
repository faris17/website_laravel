<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;
use App\Models\User;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();

        if (!$user) {

            $user = User::create([
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@example.com',
                'password' => bcrypt('password'),
            ]);
        }

        $titles = [
            'Laravel 12 Membawa Banyak Perubahan Modern',
            'Perkembangan Artificial Intelligence Tahun 2026',
            'Startup Indonesia Semakin Berkembang',
            'Belajar Coding Untuk Masa Depan',
            'Teknologi AI Membantu Dunia Pendidikan',
            'Tips Menjadi Programmer Profesional',
            'Peran Dakwah Digital di Era Modern',
            'ReactJS Semakin Populer Untuk Frontend',
            'Mengenal Dunia Backend Laravel',
            'Masa Depan Industri Teknologi Indonesia',
        ];

        foreach ($titles as $title) {

             Post::create([
                'user_id' => $user->id,

                'category_id' => Category::inRandomOrder()->first()->id,

                'title' => $title,

                'slug' => Str::slug($title),

                'excerpt' => 'Ini adalah excerpt singkat untuk ' . $title,

                'content' => '
                    <p>Lorem ipsum dolor sit amet,
                    consectetur adipiscing elit.</p>

                    <p>Vestibulum euismod, nisi vel consectetur
                    interdum, nisl nisi aliquam nisi,
                    euismod aliquam nisl nisi eu nisl.</p>

                    <p>Artikel ini membahas tentang:
                    ' . $title . '</p>
                ',

                'status' => 'published',

                'views' => rand(100, 5000),

                'published_at' => now(),
            ]);
        }
    }
}
