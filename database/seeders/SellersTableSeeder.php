<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SellersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sellers')->delete();
        
        \DB::table('sellers')->insert(array (
            0 => 
            array (
                'id' => 1,
                'f_name' => 'Kasujja',
                'l_name' => 'Muhammed',
                'phone' => '0774262923',
                'image' => 'def.png',
                'email' => 'seller@seller.com',
                'password' => bcrypt(12345678),
                'status' => 'pending',
                'remember_token' => 'h9lQdX4RX3',
                'created_at' => now(),
                'updated_at' => now(),
                'bank_name' => NULL,
                'branch' => NULL,
                'account_no' => NULL,
                'holder_name' => NULL,
                'auth_token' => NULL,
                'sales_commission_percentage' => NULL,
                'gst' => NULL,
            ),
        ));
        
        
    }
}