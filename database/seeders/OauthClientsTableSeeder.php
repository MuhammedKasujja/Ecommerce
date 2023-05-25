<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OauthClientsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('oauth_clients')->delete();
        
        \DB::table('oauth_clients')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => NULL,
                'name' => '6amtech',
                'secret' => 'GEUx5tqkviM6AAQcz4oi1dcm1KtRdJPgw41lj0eI',
                'redirect' => 'http://localhost',
                'personal_access_client' => 1,
                'password_client' => 0,
                'revoked' => 0,
                'created_at' => '2020-10-21 21:27:22',
                'updated_at' => '2020-10-21 21:27:22',
            ),
        ));
        
        
    }
}