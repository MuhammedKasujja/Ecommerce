<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CurrenciesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('currencies')->delete();
        
        \DB::table('currencies')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'USD',
                'symbol' => '$',
                'code' => 'USD',
                'exchange_rate' => '1',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => '2021-06-27 16:39:37',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'BDT',
                'symbol' => '৳',
                'code' => 'BDT',
                'exchange_rate' => '84',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => '2021-07-06 14:52:58',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Indian Rupi',
                'symbol' => '₹',
                'code' => 'INR',
                'exchange_rate' => '60',
                'status' => 1,
                'created_at' => '2020-10-15 20:23:04',
                'updated_at' => '2021-06-04 21:26:38',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Euro',
                'symbol' => '€',
                'code' => 'EUR',
                'exchange_rate' => '100',
                'status' => 1,
                'created_at' => '2021-05-26 00:00:23',
                'updated_at' => '2021-06-04 21:25:29',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'YEN',
                'symbol' => '¥',
                'code' => 'JPY',
                'exchange_rate' => '110',
                'status' => 1,
                'created_at' => '2021-06-11 01:08:31',
                'updated_at' => '2021-06-26 17:21:10',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Ringgit',
                'symbol' => 'RM',
                'code' => 'MYR',
                'exchange_rate' => '4.16',
                'status' => 1,
                'created_at' => '2021-07-03 14:08:33',
                'updated_at' => '2021-07-03 14:10:37',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Rand',
                'symbol' => 'R',
                'code' => 'ZAR',
                'exchange_rate' => '14.26',
                'status' => 1,
                'created_at' => '2021-07-03 14:12:38',
                'updated_at' => '2021-07-03 14:12:42',
            ),
        ));
        
        
    }
}