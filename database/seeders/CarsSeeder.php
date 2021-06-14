<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// add database
use Illuminate\Support\Facades\DB;

class CarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('cars')->insert([
        	[
        		'title'=>'Toyota Avanza 2017',
	        	'brand'=>'Toyota',
	        	'year'=>'2017',
	        	'distance'=>'10.000-15.000',
	        	'condition'=>'used',
	        	'price'=>'150000000',
	        	'description'=>'color: silver',
	        	'image'=>"/web app project new/images/fashion.jpg",
                'location'=>'Jakarta',
	        	'categories'=>'3'

        	],
        	[
        		'title'=>'Honda civic 2019',
	        	'brand'=>'honda',
	        	'year'=>'2019',
	        	'distance'=>'5.000-10.000',
	        	'condition'=>'used',
	        	'price'=>'300000000',
	        	'description'=>'color: white',
	        	'image'=>"/web app project new/images/fashion.jpg",
                'location'=>'Bandung',
	        	'categories'=>'3'

        	],
            [
                'title'=>'Expander 2018',
                'brand'=>'Mitsubishi',
                'year'=>'2018',
                'distance'=>'5.000-10.000',
                'condition'=>'used',
                'price'=>'200000000',
                'description'=>'color: grey',
                'image'=>"/web app project new/images/fashion.jpg",
                'location'=>'Bekasi',
                'categories'=>'3'

            ]
           

        	
        ]);
    }
}
