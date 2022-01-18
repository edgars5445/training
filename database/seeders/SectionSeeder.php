<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Section;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $section = new Section();
        $section->name = 'Personal computers';
        $section->category_id = '1';
        $section->save();

        $section = new Section();
        $section->name = 'Laptops';
        $section->category_id = '1';
        $section->save();

        $section = new Section();
        $section->name = 'Components';
        $section->category_id = '1';
        $section->save();
    }
}
