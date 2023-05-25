<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('brands')->delete();
        
        \DB::table('brands')->insert(array (
            0 => 
            array (
                'id' => 13,
                'name' => 'Dell',
                'image' => 'def.png',
                'status' => 1,
                'created_at' => '2023-05-22 12:50:43',
                'updated_at' => '2023-05-22 12:50:43',
            ),
            1 => 
            array (
                'id' => 15,
                'name' => 'Apple',
                'image' => 'def.png',
                'status' => 1,
                'created_at' => '2023-05-22 12:51:02',
                'updated_at' => '2023-05-22 12:51:02',
            ),
            2 => 
            array (
                'id' => 16,
                'name' => 'iPhone',
                'image' => 'def.png',
                'status' => 1,
                'created_at' => '2023-05-22 12:51:11',
                'updated_at' => '2023-05-22 12:51:11',
            ),
            3 => 
            array (
                'id' => 17,
                'name' => 'Android',
                'image' => 'def.png',
                'status' => 1,
                'created_at' => '2023-05-22 12:51:19',
                'updated_at' => '2023-05-22 12:51:19',
            ),
            4 => 
            array (
                'id' => 18,
                'name' => 'Samsung',
                'image' => 'def.png',
                'status' => 1,
                'created_at' => '2023-05-22 12:51:43',
                'updated_at' => '2023-05-22 12:51:43',
            ),
            5 => 
            array (
                'id' => 19,
                'name' => 'HP',
                'image' => 'def.png',
                'status' => 1,
                'created_at' => '2023-05-22 12:52:54',
                'updated_at' => '2023-05-22 12:52:54',
            ),
            6 => 
            array (
                'id' => 20,
                'name' => 'Nice',
                'image' => 'def.png',
                'status' => 1,
                'created_at' => '2023-05-22 12:53:53',
                'updated_at' => '2023-05-22 12:53:53',
            ),
            7 => 
            array (
                'id' => 21,
                'name' => 'Hisense',
                'image' => 'def.png',
                'status' => 1,
                'created_at' => '2023-05-22 12:54:12',
                'updated_at' => '2023-05-22 12:54:12',
            ),
            8 => 
            array (
                'id' => 29,
                'name' => 'Toshiba',
                'image' => 'def.png',
                'status' => 1,
                'created_at' => '2023-05-23 14:50:50',
                'updated_at' => '2023-05-23 14:50:50',
            ),
            9 => 
            array (
                'id' => 35,
                'name' => 'Tecno',
                'image' => '2023-05-24-646dacada93ef.png',
                'status' => 1,
                'created_at' => '2023-05-24 06:20:29',
                'updated_at' => '2023-05-24 06:20:29',
            ),
            10 => 
            array (
                'id' => 36,
                'name' => 'Easy',
                'image' => 'def.png',
                'status' => 1,
                'created_at' => '2023-05-24 12:07:41',
                'updated_at' => '2023-05-24 12:07:41',
            ),
            11 => 
            array (
                'id' => 37,
                'name' => 'Huawei',
                'image' => 'def.png',
                'status' => 1,
                'created_at' => '2023-05-24 12:08:27',
                'updated_at' => '2023-05-24 12:08:27',
            ),
            12 => 
            array (
                'id' => 38,
                'name' => 'Itel',
                'image' => 'def.png',
                'status' => 1,
                'created_at' => '2023-05-24 12:10:06',
                'updated_at' => '2023-05-24 12:10:06',
            ),
            13 => 
            array (
                'id' => 54,
                'name' => 'Lenovo',
                'image' => 'def.png',
                'status' => 1,
                'created_at' => '2023-05-25 12:54:53',
                'updated_at' => '2023-05-25 12:54:53',
            ),
        ));
        
        
    }
}