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
        $locationsShop = array(
            array('name'=>'Joburg Shops'),
            array('name'=>'VAAL Shops'),
            array('name'=>'PRETORIA Shops'),
            array('name'=>'POLOKWANE Shops'),
            array('name'=>'DURBAN Shops'),
            array('name'=>'SOWETO Shops'),

        );

        foreach ($locationsShop as $loc_shop){

            \App\LocationShop::create($loc_shop);
        }
        $shops = array(
            array('location_shop_id'=>1,'name'=>'JEEPE','rating'=>rand(0,100)),
            array('location_shop_id'=>1,'name'=>'BREE','rating'=>rand(0,100)),
            array('location_shop_id'=>1,'name'=>'BRAMFONTAIN','rating'=>rand(0,100)),
            array('location_shop_id'=>1,'name'=>'WITS UNIVERSITY','rating'=>rand(0,100)),
            array('location_shop_id'=>1,'name'=>'JOBURG CBD','rating'=>rand(0,100)),
            array('location_shop_id'=>1,'name'=>'SMALL','rating'=>rand(0,100)),
            array('location_shop_id'=>2,'name'=>'Shop 1','rating'=>rand(0,100)),
            array('location_shop_id'=>2,'name'=>'Shop 2','rating'=>rand(0,100)),
            array('location_shop_id'=>2,'name'=>'Shop 3','rating'=>rand(0,100)),
            array('location_shop_id'=>2,'name'=>'Shop 4','rating'=>rand(0,100)),
            array('location_shop_id'=>2,'name'=>'Shop 5','rating'=>rand(0,100)),
            array('location_shop_id'=>2,'name'=>'Shop 6','rating'=>rand(0,100)),
            array('location_shop_id'=>3,'name'=>'Lilian Ngoyi','rating'=>rand(0,100)),
            array('location_shop_id'=>3,'name'=>'Soshanguve','rating'=>rand(0,100)),
            array('location_shop_id'=>3,'name'=>'Pretorious','rating'=>rand(0,100)),
            array('location_shop_id'=>3,'name'=>'Sunny side','rating'=>rand(0,100)),
            array('location_shop_id'=>3,'name'=>'Central','rating'=>rand(0,100)),
            array('location_shop_id'=>3,'name'=>'Centurion','rating'=>rand(0,100)),
            array('location_shop_id'=>4,'name'=>'Mandela centre','rating'=>rand(0,100)),
            array('location_shop_id'=>4,'name'=>'SBD Central','rating'=>rand(0,100)),
            array('location_shop_id'=>4,'name'=>'Madiba','rating'=>rand(0,100)),
            array('location_shop_id'=>4,'name'=>'Zulu street','rating'=>rand(0,100)),
            array('location_shop_id'=>4,'name'=>'Africa center','rating'=>rand(0,100)),
            array('location_shop_id'=>4,'name'=>'Handrick Ross','rating'=>rand(0,100)),
            array('location_shop_id'=>5,'name'=>'Shop 1','rating'=>rand(0,100)),
            array('location_shop_id'=>5,'name'=>'Shop 2','rating'=>rand(0,100)),
            array('location_shop_id'=>5,'name'=>'Shop 3','rating'=>rand(0,100)),
            array('location_shop_id'=>5,'name'=>'Shop 4','rating'=>rand(0,100)),
            array('location_shop_id'=>5,'name'=>'Shop 5','rating'=>rand(0,100)),
            array('location_shop_id'=>5,'name'=>'Shop 6','rating'=>rand(0,100)),
            array('location_shop_id'=>6,'name'=>'ORLANDO','rating'=>rand(0,100)),
            array('location_shop_id'=>6,'name'=>'CHAWELO','rating'=>rand(0,100)),
            array('location_shop_id'=>6,'name'=>'MFULU','rating'=>rand(0,100)),
            array('location_shop_id'=>6,'name'=>'NALEDI','rating'=>rand(0,100)),
            array('location_shop_id'=>6,'name'=>'PROTEA GLAN','rating'=>rand(0,100)),
            array('location_shop_id'=>6,'name'=>'JABULANI','rating'=>rand(0,100)),
        );
        foreach ($shops as $shop){
            \App\ShopsInLocation::create($shop);

        }
    }
}
