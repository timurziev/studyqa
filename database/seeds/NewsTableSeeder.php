<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->delete();
        DB::table('news')->truncate();

        $faker = Faker::create();

        $text = $faker->paragraph(120);

        DB::table('news')->insert([
            [
                'title' => 'По ком трещат клоуны',
                'text' => $text,
                'image' => 'car.jpg',
            ],[
                'title' => 'Жжет — значит любит',
                'text' => $text,
                'image' => 'car2.jpg',
            ],[
                'title' => 'Миллионер без трущоб',
                'text' => $text,
                'image' => 'sea.jpg',
            ],
        ]);
    }
}
