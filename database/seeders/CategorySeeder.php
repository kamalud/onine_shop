<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name'=>'Computer',
            'slug'=>Str::slug('computer'),
        ]);

        Category::create([
            'name'=>'Mobile',
            'slug'=>Str::slug('mobile'),
        ]);

        Category::create([
            'name'=>'Laptop',
            'slug'=>Str::slug('laptop'),
        ]);
    }
}
