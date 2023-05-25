<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Bread',
                'slug' => 'bread',
                'icon' => '2023-04-20-644159538aa4b.png',
                'parent_id' => 0,
                'position' => 0,
                'created_at' => '2023-04-20 15:25:07',
                'updated_at' => '2023-05-19 13:04:38',
                'home_status' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Laptops',
                'slug' => 'laptops',
                'icon' => '2023-05-22-646b62fa712d4.png',
                'parent_id' => 0,
                'position' => 0,
                'created_at' => '2023-05-22 12:41:30',
                'updated_at' => '2023-05-22 12:41:57',
                'home_status' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Shoes',
                'slug' => 'shoes',
                'icon' => '2023-05-22-646b63118244d.png',
                'parent_id' => 0,
                'position' => 0,
                'created_at' => '2023-05-22 12:41:53',
                'updated_at' => '2023-05-22 12:41:55',
                'home_status' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Chairs',
                'slug' => 'chairs',
                'icon' => '2023-05-22-646b63409c221.png',
                'parent_id' => 0,
                'position' => 0,
                'created_at' => '2023-05-22 12:42:40',
                'updated_at' => '2023-05-22 12:43:13',
                'home_status' => 1,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Phones',
                'slug' => 'phones',
                'icon' => '2023-05-22-646b635d8889d.png',
                'parent_id' => 0,
                'position' => 0,
                'created_at' => '2023-05-22 12:43:09',
                'updated_at' => '2023-05-22 12:43:15',
                'home_status' => 1,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Keyboards',
                'slug' => 'keyboards',
                'icon' => '2023-05-22-646b63838b929.png',
                'parent_id' => 0,
                'position' => 0,
                'created_at' => '2023-05-22 12:43:47',
                'updated_at' => '2023-05-22 12:43:52',
                'home_status' => 1,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Sandals',
                'slug' => 'sandals',
                'icon' => '2023-05-22-646b63c789bae.png',
                'parent_id' => 0,
                'position' => 0,
                'created_at' => '2023-05-22 12:44:55',
                'updated_at' => '2023-05-22 12:44:57',
                'home_status' => 1,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'TVs',
                'slug' => 'tvs',
                'icon' => '2023-05-22-646b69740dd38.png',
                'parent_id' => 0,
                'position' => 0,
                'created_at' => '2023-05-22 13:09:08',
                'updated_at' => '2023-05-22 13:09:08',
                'home_status' => 0,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Desktop',
                'slug' => 'desktop',
                'icon' => '2023-05-22-646b8ab427b53.png',
                'parent_id' => 0,
                'position' => 0,
                'created_at' => '2023-05-22 15:31:00',
                'updated_at' => '2023-05-22 15:31:00',
                'home_status' => 0,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Desktop',
                'slug' => 'desktop',
                'icon' => '2023-05-22-646b8ae6797cc.png',
                'parent_id' => 0,
                'position' => 0,
                'created_at' => '2023-05-22 15:31:50',
                'updated_at' => '2023-05-22 15:31:50',
                'home_status' => 0,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Ear phones',
                'slug' => 'ear-phones',
                'icon' => '2023-05-22-646b8c0521e20.png',
                'parent_id' => 0,
                'position' => 0,
                'created_at' => '2023-05-22 15:36:37',
                'updated_at' => '2023-05-22 15:36:37',
                'home_status' => 0,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Data cables',
                'slug' => 'data-cables',
                'icon' => '2023-05-24-646de27b6669e.png',
                'parent_id' => 0,
                'position' => 0,
                'created_at' => '2023-05-24 10:10:03',
                'updated_at' => '2023-05-24 10:10:03',
                'home_status' => 0,
            ),
        ));
        
        
    }
}