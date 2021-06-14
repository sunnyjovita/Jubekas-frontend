<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// import database
use Illuminate\Support\Facades\DB;

// hashing passwords
use Illuminate\Support\Facades\Hash;


class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('user')->insert([

            [
        	'name'=>'Sunny Jovita',
        	'email'=>'sunnyjovitaaa@gmail.com',
        	'phoneNumber'=>'8787812',
        	'password'=>Hash::make('Sj123456')

        ],
         [
            'name'=>'Danka Winata',
            'email'=>'dankawinata@gmail.com',
            'phoneNumber'=>'08118989353',
            'password'=>Hash::make('Sj123456')

        ]]);
    }
}
