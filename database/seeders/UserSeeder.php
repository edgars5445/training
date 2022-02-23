<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        $user = new User();
        $user->name = 'Edgars';
        $user->email = 'pastorsedgars5445@gmail.com';
        $user->password = bcrypt('Basically1!');
        $user->role = 2;
        $user->image = "https://www.nicepng.com/png/detail/933-9332131_profile-picture-default-png.png";
        $user->save();

        $user = new User();
        $user->name = 'Tester';
        $user->email = 'test@example.com';
        $user->password = bcrypt('testing1');
        $user->role = 1;
        $user->image = "https://www.nicepng.com/png/detail/933-9332131_profile-picture-default-png.png";
        $user->save();
    }
}
