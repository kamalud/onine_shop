<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Brand::create([
            'name'=>'Dell',
            'slug'=>Str::slug('dell')
        ]);
        Brand::create([
            'name'=>'Samsung',
            'slug'=>Str::slug('samsung'),
        ]);
        Brand::create([
            'name'=>'Apple',
            'slug'=>Str::slug('apple'),
        ]);
    }
}
