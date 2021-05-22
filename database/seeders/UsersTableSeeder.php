<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Truncate our existing users
        User::truncate();

        $faker = \Faker\Factory::create();

        // Let's make sure everyone has the same password and 
        // let's hash it before the loop, or else our seeder 
        // will be too slow.
        $password = Hash::make('admin');

        User::create([
            'name' => 'Administrator',
            'email' => 'admin@test.com',
            'password' => $password,
            'email_verified_at' => 1621678080,
            'api_token' => 'token',
            'remember_token' => 'remembertoken',
            'image' => asset('assets/images/admin.png')
        ]);

        // And now let's generate a few dozen users for our app:
        for ($i = 0; $i < 50; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $password,
                'email_verified_at' => $faker->datetime,
                'api_token' => $faker->sentence,
                'remember_token' => $faker->sentence,
                'image' => $faker->imageUrl($width = 640, $height = 480)
            ]);
        }
    }
}
