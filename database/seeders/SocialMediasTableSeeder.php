<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SocialMediasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('social_medias')->delete();
        
        \DB::table('social_medias')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'twitter',
                'link' => 'https://www.w3schools.com/howto/howto_css_table_responsive.asp',
                'icon' => 'fa fa-twitter',
                'active_status' => 1,
                'status' => 1,
                'created_at' => '2021-01-01 00:18:03',
                'updated_at' => '2021-01-01 00:18:25',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'linkedin',
                'link' => 'https://dev.6amtech.com/',
                'icon' => 'fa fa-linkedin',
                'active_status' => 1,
                'status' => 1,
                'created_at' => '2021-02-27 19:23:01',
                'updated_at' => '2021-02-27 19:23:05',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'google-plus',
                'link' => 'https://dev.6amtech.com/',
                'icon' => 'fa fa-google-plus-square',
                'active_status' => 1,
                'status' => 1,
                'created_at' => '2021-02-27 19:23:30',
                'updated_at' => '2021-02-27 19:23:33',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'pinterest',
                'link' => 'https://dev.6amtech.com/',
                'icon' => 'fa fa-pinterest',
                'active_status' => 1,
                'status' => 1,
                'created_at' => '2021-02-27 19:24:14',
                'updated_at' => '2021-02-27 19:24:26',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'instagram',
                'link' => 'https://dev.6amtech.com/',
                'icon' => 'fa fa-instagram',
                'active_status' => 1,
                'status' => 1,
                'created_at' => '2021-02-27 19:24:36',
                'updated_at' => '2021-02-27 19:24:41',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'facebook',
                'link' => 'facebook.com',
                'icon' => 'fa fa-facebook',
                'active_status' => 1,
                'status' => 1,
                'created_at' => '2021-02-27 22:19:42',
                'updated_at' => '2021-06-11 20:41:59',
            ),
        ));
        
        
    }
}