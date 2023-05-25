<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ShippingMethodsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('shipping_methods')->delete();
        
        \DB::table('shipping_methods')->insert(array (
            0 => 
            array (
                'id' => 2,
                'creator_id' => 1,
                'creator_type' => 'admin',
                'title' => 'Company Vehicle',
                'cost' => '5.00',
                'duration' => '2 Week',
                'status' => 1,
                'created_at' => '2021-05-25 23:57:04',
                'updated_at' => '2021-05-25 23:57:04',
            ),
        ));
        
        
    }
}