<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        $tags = [
            'Laravel',
            'ReactJS',
            'AI',
            'OpenAI',
            'Programming',
            'Muslim',
            'Dakwah',
            'Startup',
            'Indonesia',
            'Bisnis',
            'Digital',
            'Coding',
            'Tutorial',
            'Teknologi',
            'Masyarakat',
        ];

        foreach ($tags as $tag) {

            Tag::create([
                'name' => $tag,
                'slug' => Str::slug($tag),
            ]);
        }
    }
}
