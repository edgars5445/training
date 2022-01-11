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
        $category->image ='https://thumbs.dreamstime.com/b/internet-icon-internet-symbol-wireless-technology-vector-illustration-internet-icon-internet-symbol-wireless-technology-vector-130697530.jpg';
        $category->save();

        $category = new Category();
        $category->name = 'Cars and stuff';
        $category->image='https://static.vecteezy.com/system/resources/thumbnails/003/694/243/small/car-icon-in-flat-style-simple-traffic-icon-free-vector.jpg';
        $category->save();
    }
}
