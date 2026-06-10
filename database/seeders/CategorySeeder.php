<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Teknologi',
            'Politik',
            'Olahraga',
            'Pendidikan',
            'Islam',
            'Internasional',
            'Ekonomi',
            'Lifestyle',
            'Artificial Intelligence', //artificial-intelligence
            'Startup',
        ];

        foreach ($categories as $category) {

            Category::create([
                'name' => $category,
                'slug' => Str::slug($category),
                'description' => 'Kategori ' . $category,
            ]);
        }
    }
}
