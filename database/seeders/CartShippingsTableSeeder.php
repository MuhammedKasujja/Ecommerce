<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CartShippingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cart_shippings')->delete();
        
        
        
    }
}