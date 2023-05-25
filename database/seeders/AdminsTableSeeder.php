<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admins')->delete();
        
        \DB::table('admins')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Master Admin',
                'phone' => '01759412381',
                'admin_role_id' => 1,
                'image' => 'def.png',
                'email' => 'admin@admin.com',
                'email_verified_at' => NULL,
                'password' => bcrypt(12345678), // 12345678
                'remember_token' => 'sMQxcqGTaY',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}