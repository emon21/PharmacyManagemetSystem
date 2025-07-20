<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
        $user->password = Hash::make('12345678');
        $user->role = 'admin';
        $user->ProfilePicture = 'default.png';
        $user->save();

        # User Seeder

        // $user = User::find(1);
        $user->UserProfile()->create([
            'user_id' => 2,
            'about' => 'I am a Laravel Developer | PHP | Java| JavaScript',
            'address' => 'Dhaka, Bangladesh',
            'phone' => '0123456789',
            'facebook_profile' => 'Facebook',
            'twitter_profile' => 'Twitter',
            'instagram_profile' => 'Instagram',
            'linkedin_profile' => 'Linkedin',
        ]);

        // $user->save();
    }
}
