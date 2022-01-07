<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();

        $category = new Category();
        $category->name = 'Electronics';
        $category->save();

        $category = new Category();
        $category->name = 'Internet';
        $category->save();

        $category = new Category();
        $category->name = 'Cars and stuff';
        $category->save();
    }
}
