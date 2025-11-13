<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'Makanan',
            'Kerajinan'
        ];

        foreach ($data as $item) {
            Category::create([
                'name' => $item,
                'slug' => Str::slug($item) // otomatis bikin slug
            ]);
        }
    }
}
