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
        $category->image = 'https://upload.wikimedia.org/wikipedia/commons/0/05/Noun_Electronics_Icon_2108644.svg';
        $category->save();

        $category = new Category();
        $category->name = 'Internet';
        $category->image ='http://cdn.onlinewebfonts.com/svg/img_190618.png';
        $category->save();

        $category = new Category();
        $category->name = 'Cars and stuff';
        $category->image='https://iconape.com/wp-content/png_logo_vector/car-3.png';
        $category->save();
    }
}
