<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('products')->delete();
        
        \DB::table('products')->insert(array (
            0 => 
            array (
                'id' => 1,
                'added_by' => 'admin',
                'user_id' => 1,
                'name' => 'Samsung F13',
                'slug' => 'samsung-f13-DCp2S6',
                'category_ids' => '[{"id":"5","position":1}]',
                'brand_id' => 18,
                'unit' => 'kg',
                'min_qty' => 1,
                'refundable' => 1,
                'images' => '["2023-05-22-646b66b7dbe6c.png"]',
                'thumbnail' => '2023-05-22-646b66b7dc0ad.png',
                'featured' => NULL,
                'flash_deal' => NULL,
                'video_provider' => 'youtube',
                'video_url' => NULL,
                'colors' => '[]',
                'variant_product' => 0,
                'attributes' => 'null',
                'choice_options' => '[]',
                'variation' => '[]',
                'published' => 0,
                'unit_price' => 450000.0,
                'purchase_price' => 430000.0,
                'tax' => '0',
                'tax_type' => 'percent',
                'discount' => '0',
                'discount_type' => 'flat',
                'current_stock' => 0,
                'details' => '<p>Double SIM card phone</p>',
                'free_shipping' => 0,
                'attachment' => NULL,
                'created_at' => '2023-05-22 12:57:27',
                'updated_at' => '2023-05-22 12:57:27',
                'status' => 1,
                'featured_status' => 1,
                'meta_title' => NULL,
                'meta_description' => NULL,
                'meta_image' => '2023-05-22-646b66b7dc9bc.png',
                'request_status' => 1,
                'denied_note' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'added_by' => 'admin',
                'user_id' => 1,
                'name' => 'Hisense 43\' FHD smart',
                'slug' => 'hisense-43-fhd-smart-o25q7z',
                'category_ids' => '[{"id":"8","position":1}]',
                'brand_id' => 21,
                'unit' => 'kg',
                'min_qty' => 1,
                'refundable' => 1,
                'images' => '["2023-05-22-646b6a3e918c8.png"]',
                'thumbnail' => '2023-05-22-646b6a3e91b27.png',
                'featured' => '1',
                'flash_deal' => NULL,
                'video_provider' => 'youtube',
                'video_url' => NULL,
                'colors' => '["#000000"]',
                'variant_product' => 0,
                'attributes' => 'null',
                'choice_options' => '[]',
                'variation' => '[{"type":"Black","price":956800,"sku":"H4Fs-Black","qty":"1"}]',
                'published' => 0,
                'unit_price' => 956800.0,
                'purchase_price' => 875000.0,
                'tax' => '0',
                'tax_type' => 'percent',
                'discount' => '0',
                'discount_type' => 'flat',
                'current_stock' => 1,
                'details' => '<p>Hisense 43&#39; FHD</p>',
                'free_shipping' => 0,
                'attachment' => NULL,
                'created_at' => '2023-05-22 13:12:30',
                'updated_at' => '2023-05-25 11:18:05',
                'status' => 1,
                'featured_status' => 1,
                'meta_title' => NULL,
                'meta_description' => NULL,
                'meta_image' => '2023-05-22-646b6a3e922c8.png',
                'request_status' => 1,
                'denied_note' => NULL,
            ),
        ));
        
        
    }
}