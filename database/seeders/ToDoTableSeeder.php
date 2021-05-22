<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ToDo;

class ToDoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Truncate our existing records
        ToDo::truncate();

        $faker = \Faker\Factory::create();

        // Create todo in our database
        for ($i = 0; $i < 50; $i++) {
            ToDo::create([
                'title' => $faker->sentence,
                'description' => $faker->paragraph,
                'deadline' => $faker->dateTime,
                'priority_value' => rand(1,5),
                'attachment' => $faker->imageUrl(600, 800, 'cats'),
                'user_id' => rand(1,50)
            ]);
                }
    }
}
