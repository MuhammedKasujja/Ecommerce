<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OauthPersonalAccessClientsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('oauth_personal_access_clients')->delete();
        
        \DB::table('oauth_personal_access_clients')->insert(array (
            0 => 
            array (
                'id' => 1,
                'client_id' => 1,
                'created_at' => '2020-10-21 21:27:23',
                'updated_at' => '2020-10-21 21:27:23',
            ),
        ));
        
        
    }
}