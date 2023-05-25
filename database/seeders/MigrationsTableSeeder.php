<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MigrationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('migrations')->delete();
        
        \DB::table('migrations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'migration' => '2014_10_12_000000_create_users_table',
                'batch' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'migration' => '2014_10_12_100000_create_password_resets_table',
                'batch' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'migration' => '2019_08_19_000000_create_failed_jobs_table',
                'batch' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'migration' => '2020_09_08_105159_create_admins_table',
                'batch' => 1,
            ),
            4 => 
            array (
                'id' => 5,
                'migration' => '2020_09_08_111837_create_admin_roles_table',
                'batch' => 1,
            ),
            5 => 
            array (
                'id' => 6,
                'migration' => '2020_09_16_142451_create_categories_table',
                'batch' => 2,
            ),
            6 => 
            array (
                'id' => 7,
                'migration' => '2020_09_16_181753_create_categories_table',
                'batch' => 3,
            ),
            7 => 
            array (
                'id' => 8,
                'migration' => '2020_09_17_134238_create_brands_table',
                'batch' => 4,
            ),
            8 => 
            array (
                'id' => 9,
                'migration' => '2020_09_17_203054_create_attributes_table',
                'batch' => 5,
            ),
            9 => 
            array (
                'id' => 10,
                'migration' => '2020_09_19_112509_create_coupons_table',
                'batch' => 6,
            ),
            10 => 
            array (
                'id' => 11,
                'migration' => '2020_09_19_161802_create_curriencies_table',
                'batch' => 7,
            ),
            11 => 
            array (
                'id' => 12,
                'migration' => '2020_09_20_114509_create_sellers_table',
                'batch' => 8,
            ),
            12 => 
            array (
                'id' => 13,
                'migration' => '2020_09_23_113454_create_shops_table',
                'batch' => 9,
            ),
            13 => 
            array (
                'id' => 14,
                'migration' => '2020_09_23_115615_create_shops_table',
                'batch' => 10,
            ),
            14 => 
            array (
                'id' => 15,
                'migration' => '2020_09_23_153822_create_shops_table',
                'batch' => 11,
            ),
            15 => 
            array (
                'id' => 16,
                'migration' => '2020_09_21_122817_create_products_table',
                'batch' => 12,
            ),
            16 => 
            array (
                'id' => 17,
                'migration' => '2020_09_22_140800_create_colors_table',
                'batch' => 12,
            ),
            17 => 
            array (
                'id' => 18,
                'migration' => '2020_09_28_175020_create_products_table',
                'batch' => 13,
            ),
            18 => 
            array (
                'id' => 19,
                'migration' => '2020_09_28_180311_create_products_table',
                'batch' => 14,
            ),
            19 => 
            array (
                'id' => 20,
                'migration' => '2020_10_04_105041_create_search_functions_table',
                'batch' => 15,
            ),
            20 => 
            array (
                'id' => 21,
                'migration' => '2020_10_05_150730_create_customers_table',
                'batch' => 15,
            ),
            21 => 
            array (
                'id' => 22,
                'migration' => '2020_10_08_133548_create_wishlists_table',
                'batch' => 16,
            ),
            22 => 
            array (
                'id' => 23,
                'migration' => '2016_06_01_000001_create_oauth_auth_codes_table',
                'batch' => 17,
            ),
            23 => 
            array (
                'id' => 24,
                'migration' => '2016_06_01_000002_create_oauth_access_tokens_table',
                'batch' => 17,
            ),
            24 => 
            array (
                'id' => 25,
                'migration' => '2016_06_01_000003_create_oauth_refresh_tokens_table',
                'batch' => 17,
            ),
            25 => 
            array (
                'id' => 26,
                'migration' => '2016_06_01_000004_create_oauth_clients_table',
                'batch' => 17,
            ),
            26 => 
            array (
                'id' => 27,
                'migration' => '2016_06_01_000005_create_oauth_personal_access_clients_table',
                'batch' => 17,
            ),
            27 => 
            array (
                'id' => 28,
                'migration' => '2020_10_06_133710_create_product_stocks_table',
                'batch' => 17,
            ),
            28 => 
            array (
                'id' => 29,
                'migration' => '2020_10_06_134636_create_flash_deals_table',
                'batch' => 17,
            ),
            29 => 
            array (
                'id' => 30,
                'migration' => '2020_10_06_134719_create_flash_deal_products_table',
                'batch' => 17,
            ),
            30 => 
            array (
                'id' => 31,
                'migration' => '2020_10_08_115439_create_orders_table',
                'batch' => 17,
            ),
            31 => 
            array (
                'id' => 32,
                'migration' => '2020_10_08_115453_create_order_details_table',
                'batch' => 17,
            ),
            32 => 
            array (
                'id' => 33,
                'migration' => '2020_10_08_121135_create_shipping_addresses_table',
                'batch' => 17,
            ),
            33 => 
            array (
                'id' => 34,
                'migration' => '2020_10_10_171722_create_business_settings_table',
                'batch' => 17,
            ),
            34 => 
            array (
                'id' => 35,
                'migration' => '2020_09_19_161802_create_currencies_table',
                'batch' => 18,
            ),
            35 => 
            array (
                'id' => 36,
                'migration' => '2020_10_12_152350_create_reviews_table',
                'batch' => 18,
            ),
            36 => 
            array (
                'id' => 37,
                'migration' => '2020_10_12_161834_create_reviews_table',
                'batch' => 19,
            ),
            37 => 
            array (
                'id' => 38,
                'migration' => '2020_10_12_180510_create_support_tickets_table',
                'batch' => 20,
            ),
            38 => 
            array (
                'id' => 39,
                'migration' => '2020_10_14_140130_create_transactions_table',
                'batch' => 21,
            ),
            39 => 
            array (
                'id' => 40,
                'migration' => '2020_10_14_143553_create_customer_wallets_table',
                'batch' => 21,
            ),
            40 => 
            array (
                'id' => 41,
                'migration' => '2020_10_14_143607_create_customer_wallet_histories_table',
                'batch' => 21,
            ),
            41 => 
            array (
                'id' => 42,
                'migration' => '2020_10_22_142212_create_support_ticket_convs_table',
                'batch' => 21,
            ),
            42 => 
            array (
                'id' => 43,
                'migration' => '2020_10_24_234813_create_banners_table',
                'batch' => 22,
            ),
            43 => 
            array (
                'id' => 44,
                'migration' => '2020_10_27_111557_create_shipping_methods_table',
                'batch' => 23,
            ),
            44 => 
            array (
                'id' => 45,
                'migration' => '2020_10_27_114154_add_url_to_banners_table',
                'batch' => 24,
            ),
            45 => 
            array (
                'id' => 46,
                'migration' => '2020_10_28_170308_add_shipping_id_to_order_details',
                'batch' => 25,
            ),
            46 => 
            array (
                'id' => 47,
                'migration' => '2020_11_02_140528_add_discount_to_order_table',
                'batch' => 26,
            ),
            47 => 
            array (
                'id' => 48,
                'migration' => '2020_11_03_162723_add_column_to_order_details',
                'batch' => 27,
            ),
            48 => 
            array (
                'id' => 49,
                'migration' => '2020_11_08_202351_add_url_to_banners_table',
                'batch' => 28,
            ),
            49 => 
            array (
                'id' => 50,
                'migration' => '2020_11_10_112713_create_help_topic',
                'batch' => 29,
            ),
            50 => 
            array (
                'id' => 51,
                'migration' => '2020_11_10_141513_create_contacts_table',
                'batch' => 29,
            ),
            51 => 
            array (
                'id' => 52,
                'migration' => '2020_11_15_180036_add_address_column_user_table',
                'batch' => 30,
            ),
            52 => 
            array (
                'id' => 53,
                'migration' => '2020_11_18_170209_add_status_column_to_product_table',
                'batch' => 31,
            ),
            53 => 
            array (
                'id' => 54,
                'migration' => '2020_11_19_115453_add_featured_status_product',
                'batch' => 32,
            ),
            54 => 
            array (
                'id' => 55,
                'migration' => '2020_11_21_133302_create_deal_of_the_days_table',
                'batch' => 33,
            ),
            55 => 
            array (
                'id' => 56,
                'migration' => '2020_11_20_172332_add_product_id_to_products',
                'batch' => 34,
            ),
            56 => 
            array (
                'id' => 57,
                'migration' => '2020_11_27_234439_add__state_to_shipping_addresses',
                'batch' => 34,
            ),
            57 => 
            array (
                'id' => 58,
                'migration' => '2020_11_28_091929_create_chattings_table',
                'batch' => 35,
            ),
            58 => 
            array (
                'id' => 59,
                'migration' => '2020_12_02_011815_add_bank_info_to_sellers',
                'batch' => 36,
            ),
            59 => 
            array (
                'id' => 60,
                'migration' => '2020_12_08_193234_create_social_medias_table',
                'batch' => 37,
            ),
            60 => 
            array (
                'id' => 61,
                'migration' => '2020_12_13_122649_shop_id_to_chattings',
                'batch' => 37,
            ),
            61 => 
            array (
                'id' => 62,
                'migration' => '2020_12_14_145116_create_seller_wallet_histories_table',
                'batch' => 38,
            ),
            62 => 
            array (
                'id' => 63,
                'migration' => '2020_12_14_145127_create_seller_wallets_table',
                'batch' => 38,
            ),
            63 => 
            array (
                'id' => 64,
                'migration' => '2020_12_15_174804_create_admin_wallets_table',
                'batch' => 39,
            ),
            64 => 
            array (
                'id' => 65,
                'migration' => '2020_12_15_174821_create_admin_wallet_histories_table',
                'batch' => 39,
            ),
            65 => 
            array (
                'id' => 66,
                'migration' => '2020_12_15_214312_create_feature_deals_table',
                'batch' => 40,
            ),
            66 => 
            array (
                'id' => 67,
                'migration' => '2020_12_17_205712_create_withdraw_requests_table',
                'batch' => 41,
            ),
            67 => 
            array (
                'id' => 68,
                'migration' => '2021_02_22_161510_create_notifications_table',
                'batch' => 42,
            ),
            68 => 
            array (
                'id' => 69,
                'migration' => '2021_02_24_154706_add_deal_type_to_flash_deals',
                'batch' => 43,
            ),
            69 => 
            array (
                'id' => 70,
                'migration' => '2021_03_03_204349_add_cm_firebase_token_to_users',
                'batch' => 44,
            ),
            70 => 
            array (
                'id' => 71,
                'migration' => '2021_04_17_134848_add_column_to_order_details_stock',
                'batch' => 45,
            ),
            71 => 
            array (
                'id' => 72,
                'migration' => '2021_05_12_155401_add_auth_token_seller',
                'batch' => 46,
            ),
            72 => 
            array (
                'id' => 73,
                'migration' => '2021_06_03_104531_ex_rate_update',
                'batch' => 47,
            ),
            73 => 
            array (
                'id' => 74,
                'migration' => '2021_06_03_222413_amount_withdraw_req',
                'batch' => 48,
            ),
            74 => 
            array (
                'id' => 75,
                'migration' => '2021_06_04_154501_seller_wallet_withdraw_bal',
                'batch' => 49,
            ),
            75 => 
            array (
                'id' => 76,
                'migration' => '2021_06_04_195853_product_dis_tax',
                'batch' => 50,
            ),
            76 => 
            array (
                'id' => 77,
                'migration' => '2021_05_27_103505_create_product_translations_table',
                'batch' => 51,
            ),
            77 => 
            array (
                'id' => 78,
                'migration' => '2021_06_17_054551_create_soft_credentials_table',
                'batch' => 51,
            ),
            78 => 
            array (
                'id' => 79,
                'migration' => '2021_06_29_212549_add_active_col_user_table',
                'batch' => 52,
            ),
            79 => 
            array (
                'id' => 80,
                'migration' => '2021_06_30_212619_add_col_to_contact',
                'batch' => 53,
            ),
            80 => 
            array (
                'id' => 81,
                'migration' => '2021_07_01_160828_add_col_daily_needs_products',
                'batch' => 54,
            ),
            81 => 
            array (
                'id' => 82,
                'migration' => '2021_07_04_182331_add_col_seller_sales_commission',
                'batch' => 55,
            ),
            82 => 
            array (
                'id' => 83,
                'migration' => '2021_08_07_190655_add_seo_columns_to_products',
                'batch' => 56,
            ),
            83 => 
            array (
                'id' => 84,
                'migration' => '2021_08_07_205913_add_col_to_category_table',
                'batch' => 56,
            ),
            84 => 
            array (
                'id' => 85,
                'migration' => '2021_08_07_210808_add_col_to_shops_table',
                'batch' => 56,
            ),
            85 => 
            array (
                'id' => 86,
                'migration' => '2021_08_14_205216_change_product_price_col_type',
                'batch' => 56,
            ),
            86 => 
            array (
                'id' => 87,
                'migration' => '2021_08_16_201505_change_order_price_col',
                'batch' => 56,
            ),
            87 => 
            array (
                'id' => 88,
                'migration' => '2021_08_16_201552_change_order_details_price_col',
                'batch' => 56,
            ),
            88 => 
            array (
                'id' => 89,
                'migration' => '2019_09_29_154000_create_payment_cards_table',
                'batch' => 57,
            ),
            89 => 
            array (
                'id' => 90,
                'migration' => '2021_08_17_213934_change_col_type_seller_earning_history',
                'batch' => 57,
            ),
            90 => 
            array (
                'id' => 91,
                'migration' => '2021_08_17_214109_change_col_type_admin_earning_history',
                'batch' => 57,
            ),
            91 => 
            array (
                'id' => 92,
                'migration' => '2021_08_17_214232_change_col_type_admin_wallet',
                'batch' => 57,
            ),
            92 => 
            array (
                'id' => 93,
                'migration' => '2021_08_17_214405_change_col_type_seller_wallet',
                'batch' => 57,
            ),
            93 => 
            array (
                'id' => 94,
                'migration' => '2021_08_22_184834_add_publish_to_products_table',
                'batch' => 57,
            ),
            94 => 
            array (
                'id' => 95,
                'migration' => '2021_09_08_211832_add_social_column_to_users_table',
                'batch' => 57,
            ),
            95 => 
            array (
                'id' => 96,
                'migration' => '2021_09_13_165535_add_col_to_user',
                'batch' => 57,
            ),
            96 => 
            array (
                'id' => 97,
                'migration' => '2021_09_19_061647_add_limit_to_coupons_table',
                'batch' => 57,
            ),
            97 => 
            array (
                'id' => 98,
                'migration' => '2021_09_20_020716_add_coupon_code_to_orders_table',
                'batch' => 57,
            ),
            98 => 
            array (
                'id' => 99,
                'migration' => '2021_09_23_003059_add_gst_to_sellers_table',
                'batch' => 57,
            ),
            99 => 
            array (
                'id' => 100,
                'migration' => '2021_09_28_025411_create_order_transactions_table',
                'batch' => 57,
            ),
            100 => 
            array (
                'id' => 101,
                'migration' => '2021_10_02_185124_create_carts_table',
                'batch' => 57,
            ),
            101 => 
            array (
                'id' => 102,
                'migration' => '2021_10_02_190207_create_cart_shippings_table',
                'batch' => 57,
            ),
            102 => 
            array (
                'id' => 103,
                'migration' => '2021_10_03_194334_add_col_order_table',
                'batch' => 57,
            ),
            103 => 
            array (
                'id' => 104,
                'migration' => '2021_10_03_200536_add_shipping_cost',
                'batch' => 57,
            ),
            104 => 
            array (
                'id' => 105,
                'migration' => '2021_10_04_153201_add_col_to_order_table',
                'batch' => 57,
            ),
            105 => 
            array (
                'id' => 106,
                'migration' => '2021_10_07_172701_add_col_cart_shop_info',
                'batch' => 57,
            ),
            106 => 
            array (
                'id' => 107,
                'migration' => '2021_10_07_184442_create_phone_or_email_verifications_table',
                'batch' => 57,
            ),
            107 => 
            array (
                'id' => 108,
                'migration' => '2021_10_07_185416_add_user_table_email_verified',
                'batch' => 57,
            ),
            108 => 
            array (
                'id' => 109,
                'migration' => '2021_10_11_192739_add_transaction_amount_table',
                'batch' => 57,
            ),
            109 => 
            array (
                'id' => 110,
                'migration' => '2021_10_11_200850_add_order_verification_code',
                'batch' => 57,
            ),
            110 => 
            array (
                'id' => 111,
                'migration' => '2021_10_12_083241_add_col_to_order_transaction',
                'batch' => 57,
            ),
            111 => 
            array (
                'id' => 112,
                'migration' => '2021_10_12_084440_add_seller_id_to_order',
                'batch' => 57,
            ),
            112 => 
            array (
                'id' => 113,
                'migration' => '2021_10_12_102853_change_col_type',
                'batch' => 57,
            ),
            113 => 
            array (
                'id' => 114,
                'migration' => '2021_10_12_110434_add_col_to_admin_wallet',
                'batch' => 57,
            ),
            114 => 
            array (
                'id' => 115,
                'migration' => '2021_10_12_110829_add_col_to_seller_wallet',
                'batch' => 57,
            ),
            115 => 
            array (
                'id' => 116,
                'migration' => '2021_10_13_091801_add_col_to_admin_wallets',
                'batch' => 57,
            ),
            116 => 
            array (
                'id' => 117,
                'migration' => '2021_10_13_092000_add_col_to_seller_wallets_tax',
                'batch' => 57,
            ),
            117 => 
            array (
                'id' => 118,
                'migration' => '2021_10_13_165947_rename_and_remove_col_seller_wallet',
                'batch' => 57,
            ),
            118 => 
            array (
                'id' => 119,
                'migration' => '2021_10_13_170258_rename_and_remove_col_admin_wallet',
                'batch' => 57,
            ),
            119 => 
            array (
                'id' => 120,
                'migration' => '2021_10_14_061603_column_update_order_transaction',
                'batch' => 57,
            ),
            120 => 
            array (
                'id' => 121,
                'migration' => '2021_10_15_103339_remove_col_from_seller_wallet',
                'batch' => 57,
            ),
            121 => 
            array (
                'id' => 122,
                'migration' => '2021_10_15_104419_add_id_col_order_tran',
                'batch' => 57,
            ),
            122 => 
            array (
                'id' => 123,
                'migration' => '2021_10_15_213454_update_string_limit',
                'batch' => 57,
            ),
            123 => 
            array (
                'id' => 124,
                'migration' => '2021_10_16_234037_change_col_type_translation',
                'batch' => 57,
            ),
            124 => 
            array (
                'id' => 125,
                'migration' => '2021_10_16_234329_change_col_type_translation_1',
                'batch' => 57,
            ),
            125 => 
            array (
                'id' => 126,
                'migration' => '2023_05_23_072650_create_admin_roles_table',
                'batch' => 0,
            ),
            126 => 
            array (
                'id' => 127,
                'migration' => '2023_05_23_072650_create_admin_wallet_histories_table',
                'batch' => 0,
            ),
            127 => 
            array (
                'id' => 128,
                'migration' => '2023_05_23_072650_create_admin_wallets_table',
                'batch' => 0,
            ),
            128 => 
            array (
                'id' => 129,
                'migration' => '2023_05_23_072650_create_admins_table',
                'batch' => 0,
            ),
            129 => 
            array (
                'id' => 130,
                'migration' => '2023_05_23_072650_create_attributes_table',
                'batch' => 0,
            ),
            130 => 
            array (
                'id' => 131,
                'migration' => '2023_05_23_072650_create_banners_table',
                'batch' => 0,
            ),
            131 => 
            array (
                'id' => 132,
                'migration' => '2023_05_23_072650_create_brands_table',
                'batch' => 0,
            ),
            132 => 
            array (
                'id' => 133,
                'migration' => '2023_05_23_072650_create_business_settings_table',
                'batch' => 0,
            ),
            133 => 
            array (
                'id' => 134,
                'migration' => '2023_05_23_072650_create_cart_shippings_table',
                'batch' => 0,
            ),
            134 => 
            array (
                'id' => 135,
                'migration' => '2023_05_23_072650_create_carts_table',
                'batch' => 0,
            ),
            135 => 
            array (
                'id' => 136,
                'migration' => '2023_05_23_072650_create_categories_table',
                'batch' => 0,
            ),
            136 => 
            array (
                'id' => 137,
                'migration' => '2023_05_23_072650_create_chattings_table',
                'batch' => 0,
            ),
            137 => 
            array (
                'id' => 138,
                'migration' => '2023_05_23_072650_create_colors_table',
                'batch' => 0,
            ),
            138 => 
            array (
                'id' => 139,
                'migration' => '2023_05_23_072650_create_contacts_table',
                'batch' => 0,
            ),
            139 => 
            array (
                'id' => 140,
                'migration' => '2023_05_23_072650_create_coupons_table',
                'batch' => 0,
            ),
            140 => 
            array (
                'id' => 141,
                'migration' => '2023_05_23_072650_create_currencies_table',
                'batch' => 0,
            ),
            141 => 
            array (
                'id' => 142,
                'migration' => '2023_05_23_072650_create_customer_wallet_histories_table',
                'batch' => 0,
            ),
            142 => 
            array (
                'id' => 143,
                'migration' => '2023_05_23_072650_create_customer_wallets_table',
                'batch' => 0,
            ),
            143 => 
            array (
                'id' => 144,
                'migration' => '2023_05_23_072650_create_deal_of_the_days_table',
                'batch' => 0,
            ),
            144 => 
            array (
                'id' => 145,
                'migration' => '2023_05_23_072650_create_failed_jobs_table',
                'batch' => 0,
            ),
            145 => 
            array (
                'id' => 146,
                'migration' => '2023_05_23_072650_create_feature_deals_table',
                'batch' => 0,
            ),
            146 => 
            array (
                'id' => 147,
                'migration' => '2023_05_23_072650_create_flash_deal_products_table',
                'batch' => 0,
            ),
            147 => 
            array (
                'id' => 148,
                'migration' => '2023_05_23_072650_create_flash_deals_table',
                'batch' => 0,
            ),
            148 => 
            array (
                'id' => 149,
                'migration' => '2023_05_23_072650_create_help_topics_table',
                'batch' => 0,
            ),
            149 => 
            array (
                'id' => 150,
                'migration' => '2023_05_23_072650_create_notifications_table',
                'batch' => 0,
            ),
            150 => 
            array (
                'id' => 151,
                'migration' => '2023_05_23_072650_create_oauth_access_tokens_table',
                'batch' => 0,
            ),
            151 => 
            array (
                'id' => 152,
                'migration' => '2023_05_23_072650_create_oauth_auth_codes_table',
                'batch' => 0,
            ),
            152 => 
            array (
                'id' => 153,
                'migration' => '2023_05_23_072650_create_oauth_clients_table',
                'batch' => 0,
            ),
            153 => 
            array (
                'id' => 154,
                'migration' => '2023_05_23_072650_create_oauth_personal_access_clients_table',
                'batch' => 0,
            ),
            154 => 
            array (
                'id' => 155,
                'migration' => '2023_05_23_072650_create_oauth_refresh_tokens_table',
                'batch' => 0,
            ),
            155 => 
            array (
                'id' => 156,
                'migration' => '2023_05_23_072650_create_order_details_table',
                'batch' => 0,
            ),
            156 => 
            array (
                'id' => 157,
                'migration' => '2023_05_23_072650_create_order_transactions_table',
                'batch' => 0,
            ),
            157 => 
            array (
                'id' => 158,
                'migration' => '2023_05_23_072650_create_orders_table',
                'batch' => 0,
            ),
            158 => 
            array (
                'id' => 159,
                'migration' => '2023_05_23_072650_create_password_resets_table',
                'batch' => 0,
            ),
            159 => 
            array (
                'id' => 160,
                'migration' => '2023_05_23_072650_create_phone_or_email_verifications_table',
                'batch' => 0,
            ),
            160 => 
            array (
                'id' => 161,
                'migration' => '2023_05_23_072650_create_product_stocks_table',
                'batch' => 0,
            ),
            161 => 
            array (
                'id' => 162,
                'migration' => '2023_05_23_072650_create_products_table',
                'batch' => 0,
            ),
            162 => 
            array (
                'id' => 163,
                'migration' => '2023_05_23_072650_create_reviews_table',
                'batch' => 0,
            ),
            163 => 
            array (
                'id' => 164,
                'migration' => '2023_05_23_072650_create_search_functions_table',
                'batch' => 0,
            ),
            164 => 
            array (
                'id' => 165,
                'migration' => '2023_05_23_072650_create_seller_wallet_histories_table',
                'batch' => 0,
            ),
            165 => 
            array (
                'id' => 166,
                'migration' => '2023_05_23_072650_create_seller_wallets_table',
                'batch' => 0,
            ),
            166 => 
            array (
                'id' => 167,
                'migration' => '2023_05_23_072650_create_sellers_table',
                'batch' => 0,
            ),
            167 => 
            array (
                'id' => 168,
                'migration' => '2023_05_23_072650_create_shipping_addresses_table',
                'batch' => 0,
            ),
            168 => 
            array (
                'id' => 169,
                'migration' => '2023_05_23_072650_create_shipping_methods_table',
                'batch' => 0,
            ),
            169 => 
            array (
                'id' => 170,
                'migration' => '2023_05_23_072650_create_shops_table',
                'batch' => 0,
            ),
            170 => 
            array (
                'id' => 171,
                'migration' => '2023_05_23_072650_create_social_medias_table',
                'batch' => 0,
            ),
            171 => 
            array (
                'id' => 172,
                'migration' => '2023_05_23_072650_create_soft_credentials_table',
                'batch' => 0,
            ),
            172 => 
            array (
                'id' => 173,
                'migration' => '2023_05_23_072650_create_support_ticket_convs_table',
                'batch' => 0,
            ),
            173 => 
            array (
                'id' => 174,
                'migration' => '2023_05_23_072650_create_support_tickets_table',
                'batch' => 0,
            ),
            174 => 
            array (
                'id' => 175,
                'migration' => '2023_05_23_072650_create_transactions_table',
                'batch' => 0,
            ),
            175 => 
            array (
                'id' => 176,
                'migration' => '2023_05_23_072650_create_translations_table',
                'batch' => 0,
            ),
            176 => 
            array (
                'id' => 177,
                'migration' => '2023_05_23_072650_create_users_table',
                'batch' => 0,
            ),
            177 => 
            array (
                'id' => 178,
                'migration' => '2023_05_23_072650_create_wishlists_table',
                'batch' => 0,
            ),
            178 => 
            array (
                'id' => 179,
                'migration' => '2023_05_23_072650_create_withdraw_requests_table',
                'batch' => 0,
            ),
            179 => 
            array (
                'id' => 180,
                'migration' => '2023_05_23_082312_create_admin_roles_table',
                'batch' => 0,
            ),
            180 => 
            array (
                'id' => 181,
                'migration' => '2023_05_23_082312_create_admin_wallet_histories_table',
                'batch' => 0,
            ),
            181 => 
            array (
                'id' => 182,
                'migration' => '2023_05_23_082312_create_admin_wallets_table',
                'batch' => 0,
            ),
            182 => 
            array (
                'id' => 183,
                'migration' => '2023_05_23_082312_create_admins_table',
                'batch' => 0,
            ),
            183 => 
            array (
                'id' => 184,
                'migration' => '2023_05_23_082312_create_attributes_table',
                'batch' => 0,
            ),
            184 => 
            array (
                'id' => 185,
                'migration' => '2023_05_23_082312_create_banners_table',
                'batch' => 0,
            ),
            185 => 
            array (
                'id' => 186,
                'migration' => '2023_05_23_082312_create_brands_table',
                'batch' => 0,
            ),
            186 => 
            array (
                'id' => 187,
                'migration' => '2023_05_23_082312_create_business_settings_table',
                'batch' => 0,
            ),
            187 => 
            array (
                'id' => 188,
                'migration' => '2023_05_23_082312_create_cart_shippings_table',
                'batch' => 0,
            ),
            188 => 
            array (
                'id' => 189,
                'migration' => '2023_05_23_082312_create_carts_table',
                'batch' => 0,
            ),
            189 => 
            array (
                'id' => 190,
                'migration' => '2023_05_23_082312_create_categories_table',
                'batch' => 0,
            ),
            190 => 
            array (
                'id' => 191,
                'migration' => '2023_05_23_082312_create_chattings_table',
                'batch' => 0,
            ),
            191 => 
            array (
                'id' => 192,
                'migration' => '2023_05_23_082312_create_colors_table',
                'batch' => 0,
            ),
            192 => 
            array (
                'id' => 193,
                'migration' => '2023_05_23_082312_create_contacts_table',
                'batch' => 0,
            ),
            193 => 
            array (
                'id' => 194,
                'migration' => '2023_05_23_082312_create_coupons_table',
                'batch' => 0,
            ),
            194 => 
            array (
                'id' => 195,
                'migration' => '2023_05_23_082312_create_currencies_table',
                'batch' => 0,
            ),
            195 => 
            array (
                'id' => 196,
                'migration' => '2023_05_23_082312_create_customer_wallet_histories_table',
                'batch' => 0,
            ),
            196 => 
            array (
                'id' => 197,
                'migration' => '2023_05_23_082312_create_customer_wallets_table',
                'batch' => 0,
            ),
            197 => 
            array (
                'id' => 198,
                'migration' => '2023_05_23_082312_create_deal_of_the_days_table',
                'batch' => 0,
            ),
            198 => 
            array (
                'id' => 199,
                'migration' => '2023_05_23_082312_create_failed_jobs_table',
                'batch' => 0,
            ),
            199 => 
            array (
                'id' => 200,
                'migration' => '2023_05_23_082312_create_feature_deals_table',
                'batch' => 0,
            ),
            200 => 
            array (
                'id' => 201,
                'migration' => '2023_05_23_082312_create_flash_deal_products_table',
                'batch' => 0,
            ),
            201 => 
            array (
                'id' => 202,
                'migration' => '2023_05_23_082312_create_flash_deals_table',
                'batch' => 0,
            ),
            202 => 
            array (
                'id' => 203,
                'migration' => '2023_05_23_082312_create_help_topics_table',
                'batch' => 0,
            ),
            203 => 
            array (
                'id' => 204,
                'migration' => '2023_05_23_082312_create_notifications_table',
                'batch' => 0,
            ),
            204 => 
            array (
                'id' => 205,
                'migration' => '2023_05_23_082312_create_oauth_access_tokens_table',
                'batch' => 0,
            ),
            205 => 
            array (
                'id' => 206,
                'migration' => '2023_05_23_082312_create_oauth_auth_codes_table',
                'batch' => 0,
            ),
            206 => 
            array (
                'id' => 207,
                'migration' => '2023_05_23_082312_create_oauth_clients_table',
                'batch' => 0,
            ),
            207 => 
            array (
                'id' => 208,
                'migration' => '2023_05_23_082312_create_oauth_personal_access_clients_table',
                'batch' => 0,
            ),
            208 => 
            array (
                'id' => 209,
                'migration' => '2023_05_23_082312_create_oauth_refresh_tokens_table',
                'batch' => 0,
            ),
            209 => 
            array (
                'id' => 210,
                'migration' => '2023_05_23_082312_create_order_details_table',
                'batch' => 0,
            ),
            210 => 
            array (
                'id' => 211,
                'migration' => '2023_05_23_082312_create_order_transactions_table',
                'batch' => 0,
            ),
            211 => 
            array (
                'id' => 212,
                'migration' => '2023_05_23_082312_create_orders_table',
                'batch' => 0,
            ),
            212 => 
            array (
                'id' => 213,
                'migration' => '2023_05_23_082312_create_password_resets_table',
                'batch' => 0,
            ),
            213 => 
            array (
                'id' => 214,
                'migration' => '2023_05_23_082312_create_phone_or_email_verifications_table',
                'batch' => 0,
            ),
            214 => 
            array (
                'id' => 215,
                'migration' => '2023_05_23_082312_create_product_stocks_table',
                'batch' => 0,
            ),
            215 => 
            array (
                'id' => 216,
                'migration' => '2023_05_23_082312_create_products_table',
                'batch' => 0,
            ),
            216 => 
            array (
                'id' => 217,
                'migration' => '2023_05_23_082312_create_reviews_table',
                'batch' => 0,
            ),
            217 => 
            array (
                'id' => 218,
                'migration' => '2023_05_23_082312_create_search_functions_table',
                'batch' => 0,
            ),
            218 => 
            array (
                'id' => 219,
                'migration' => '2023_05_23_082312_create_seller_wallet_histories_table',
                'batch' => 0,
            ),
            219 => 
            array (
                'id' => 220,
                'migration' => '2023_05_23_082312_create_seller_wallets_table',
                'batch' => 0,
            ),
            220 => 
            array (
                'id' => 221,
                'migration' => '2023_05_23_082312_create_sellers_table',
                'batch' => 0,
            ),
            221 => 
            array (
                'id' => 222,
                'migration' => '2023_05_23_082312_create_shipping_addresses_table',
                'batch' => 0,
            ),
            222 => 
            array (
                'id' => 223,
                'migration' => '2023_05_23_082312_create_shipping_methods_table',
                'batch' => 0,
            ),
            223 => 
            array (
                'id' => 224,
                'migration' => '2023_05_23_082312_create_shops_table',
                'batch' => 0,
            ),
            224 => 
            array (
                'id' => 225,
                'migration' => '2023_05_23_082312_create_social_medias_table',
                'batch' => 0,
            ),
            225 => 
            array (
                'id' => 226,
                'migration' => '2023_05_23_082312_create_soft_credentials_table',
                'batch' => 0,
            ),
            226 => 
            array (
                'id' => 227,
                'migration' => '2023_05_23_082312_create_support_ticket_convs_table',
                'batch' => 0,
            ),
            227 => 
            array (
                'id' => 228,
                'migration' => '2023_05_23_082312_create_support_tickets_table',
                'batch' => 0,
            ),
            228 => 
            array (
                'id' => 229,
                'migration' => '2023_05_23_082312_create_transactions_table',
                'batch' => 0,
            ),
            229 => 
            array (
                'id' => 230,
                'migration' => '2023_05_23_082312_create_translations_table',
                'batch' => 0,
            ),
            230 => 
            array (
                'id' => 231,
                'migration' => '2023_05_23_082312_create_users_table',
                'batch' => 0,
            ),
            231 => 
            array (
                'id' => 232,
                'migration' => '2023_05_23_082312_create_wishlists_table',
                'batch' => 0,
            ),
            232 => 
            array (
                'id' => 233,
                'migration' => '2023_05_23_082312_create_withdraw_requests_table',
                'batch' => 0,
            ),
        ));
        
        
    }
}