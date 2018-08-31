<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('users')->truncate();

        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'mail@mail.ru',
                'password' => bcrypt(123456),
                'is_admin' => true
            ]
        ]);
    }
}
