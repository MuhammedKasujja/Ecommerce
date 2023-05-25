<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminWalletsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admin_wallets')->delete();
        
        \DB::table('admin_wallets')->insert(array (
            0 => 
            array (
                'id' => 1,
                'admin_id' => 1,
                'inhouse_earning' => 0.0,
                'withdrawn' => 0.0,
                'created_at' => NULL,
                'updated_at' => NULL,
                'commission_earned' => 0.0,
                'delivery_charge_earned' => 0.0,
                'pending_amount' => 0.0,
                'total_tax_collected' => 0.0,
            ),
        ));
        
        
    }
}