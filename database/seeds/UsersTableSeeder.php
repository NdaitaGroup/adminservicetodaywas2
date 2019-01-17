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
        \App\User::create(['name'=>'Real Hlungwane',
            'email'=>'real@gmail.com',
            'password'=>bcrypt('secret')
        ]);
    }
}
