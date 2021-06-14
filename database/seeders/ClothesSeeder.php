<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// add database
use Illuminate\Support\Facades\DB;


class ClothesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('clothes')->insert([
        	[
        		'title'=>'Jual celana murah',
	        	'type'=>'celana',
	        	'condition'=>'new',
	        	'price'=>'150000',
	        	'description'=>'size: S, color: white',
	        	'image'=>"public/web app project new/images/fashion.jpg",
                'location'=>'Jakarta',
                'categories'=>'1'

        	],
        	[
        		'title'=>'Jual polo shirt',
	        	'type'=>"kemeja",
	        	'condition'=>'new',
	        	'price'=>'300000',
	        	'description'=>'size: L, color: black',
	        	'image'=>"public/web app project new/images/fashion.jpg",
                'location'=>'Bekasi',
                'categories'=>'1'

        	],
        	[
        		'title'=>'Dress polkadot',
	        	'type'=>'baju',
	        	'condition'=>'new',
	        	'price'=>'200000',
	        	'description'=>'size: All Size, color: polkadot',
	        	'image'=>"public/web app project new/images/fashion 1.jpg",
                'location'=>'Depok',
                'categories'=>'1'
        	]
        	
        ]);
    }
}
