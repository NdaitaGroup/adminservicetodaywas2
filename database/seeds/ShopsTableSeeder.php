<?php

use Illuminate\Database\Seeder;

class ShopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stores = array(
            array('name'=>'Swit Shuga'),

        );
        foreach ($stores as $store) {
            \App\Stores::create($store);
        }

        $locationsShop = array(
            array('name'=>'Johannesburg','stores_id'=>1),

        );

        foreach ($locationsShop as $loc_shop){

            \App\LocationShop::create($loc_shop);
        }
        $shops = array(
            array('location_shop_id'=>1,'name'=>'6 plien street johannesburg, liscence lofts','rating'=>0),


        );
        foreach ($shops as $shop){
            \App\ShopsInLocation::create($shop);

        }
    }
}
