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
            'password'=>bcrypt('secret'),
            'user_type'=>'Super'
        ]);


        //Get Spar Location store
        $location = DB::table('location_shops')->where('stores_id', 1)->first();
        //get Shop In Location
        $location = DB::table('shops_in_locations')->where('location_shop_id', $location->id)->first();

        \App\User::create(['name'=>'Zwidofhela Phaswana',
            'email'=>'Zwidomaluta@gmail.com',
            'password'=>bcrypt('secret'),
            'user_type'=>'Manager',
            'shops_in_locations_id'=>$location->id,
        ]);
        \App\User::create(['name'=>'Gordon Matshwane',
            'email'=>'gordonm87@gmail.com',
            'password'=>bcrypt('secret'),
            'user_type'=>'Admin',
            'shops_in_locations_id'=>$location->id,
        ]);

        //Pmulatedzi@gmail.com


        \App\User::create(['name'=>'P Mulatedzi',
            'email'=>'Pmulatedzi@gmail.com',
            'password'=>bcrypt('secret'),
            'user_type'=>'Manager',
            'shops_in_locations_id'=>$location->id,
        ]);
    }
}
