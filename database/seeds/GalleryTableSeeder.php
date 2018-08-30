<?php

use Illuminate\Database\Seeder;

class GalleryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('galleries')->delete();
        DB::table('galleries')->truncate();

        DB::table('galleries')->insert([
            [
                'image' => 'badge.jpg',
            ],[
                'image' => 'badge1.jpg',
            ],[
                'image' => 'badge2.jpg',
            ],[
                'image' => 'badge3.jpg',
            ],[
                'image' => 'badge4.jpg',
            ]
        ]);
    }
}
