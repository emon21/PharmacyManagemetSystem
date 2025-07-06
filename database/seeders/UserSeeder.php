<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User

        $user = new User();
        $user->name = 'User';
        $user->email = 'user@mail.com';
        $user->password = bcrypt('12345678');
        $user->role = 'user';
        $user->ProfilePicture = 'default.png';
        $user->save(); // User

        # Admin
        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@mail.com';
        $user->password = bcrypt('12345678');
        $user->role = 'admin';
        $user->ProfilePicture = 'default.png';
        $user->save();

        # User Seeder

        // $user = User::find(1);
        $user->UserProfile()->create([
            'user_id' => 2,
            'about' => 'Tempora libero non est unde veniam est qui dolor',
            'address' => 'Dhaka, Bangladesh',
            'phone' => '0123456789',
            'facebook_profile' => '#',
            'twitter_profile' => '#',
            'instagram_profile' => '#',
            'linkedin_profile' => '#',
        ]);

        // $user->save();
    }
}
