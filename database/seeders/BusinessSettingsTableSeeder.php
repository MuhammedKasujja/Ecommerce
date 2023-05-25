<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BusinessSettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('business_settings')->delete();

        \DB::table('business_settings')->insert(array(
            0 =>
            array(
                'id' => 1,
                'type' => 'system_default_currency',
                'value' => '1',
                'created_at' => '2020-10-11 10:43:44',
                'updated_at' => '2021-06-04 21:25:29',
            ),
            1 =>
            array(
                'id' => 2,
                'type' => 'language',
                'value' => '[{"id":"1","name":"english","code":"en","status":1}]',
                'created_at' => '2020-10-11 10:53:02',
                'updated_at' => '2021-06-11 00:16:25',
            ),
            2 =>
            array(
                'id' => 3,
                'type' => 'mail_config',
                'value' => '{"name":"demo","host":"mail.demo.com","driver":"SMTP","port":"587","username":"info@demo.com","email_id":"info@demo.com","encryption":"TLS","password":"demo"}',
                'created_at' => '2020-10-12 13:29:18',
                'updated_at' => '2023-04-20 15:07:59',
            ),
            3 =>
            array(
                'id' => 4,
                'type' => 'cash_on_delivery',
                'value' => '{"status":"1"}',
                'created_at' => NULL,
                'updated_at' => '2021-05-26 00:21:15',
            ),
            4 =>
            array(
                'id' => 6,
                'type' => 'ssl_commerz_payment',
                'value' => '{"status":"0","store_id":null,"store_password":null}',
                'created_at' => '2020-11-09 11:36:51',
                'updated_at' => '2021-07-06 15:29:46',
            ),
            5 =>
            array(
                'id' => 7,
                'type' => 'paypal',
                'value' => '{"status":"0","paypal_client_id":null,"paypal_secret":null}',
                'created_at' => '2020-11-09 11:51:39',
                'updated_at' => '2021-07-06 15:29:57',
            ),
            6 =>
            array(
                'id' => 8,
                'type' => 'stripe',
                'value' => '{"status":"0","api_key":null,"published_key":null}',
                'created_at' => '2020-11-09 12:01:47',
                'updated_at' => '2021-07-06 15:30:05',
            ),
            7 =>
            array(
                'id' => 9,
                'type' => 'paytm',
                'value' => '{"status":"0","paytm_merchant_id":"dbzfb","paytm_merchant_key":"sdfbsdfb","paytm_merchant_website":"dsfbsdf","paytm_channel":"sdfbsdf","paytm_industry_type":"sdfb"}',
                'created_at' => '2020-11-09 12:19:08',
                'updated_at' => '2020-11-09 12:19:56',
            ),
            8 =>
            array(
                'id' => 10,
                'type' => 'company_phone',
                'value' => '000000000',
                'created_at' => NULL,
                'updated_at' => '2020-12-08 17:15:01',
            ),
            9 =>
            array(
                'id' => 11,
                'type' => 'company_name',
                'value' => 'KasmudShop',
                'created_at' => NULL,
                'updated_at' => '2021-02-27 21:11:53',
            ),
            10 =>
            array(
                'id' => 12,
                'type' => 'company_web_logo',
                'value' => '2021-05-25-60ad1b313a9d4.png',
                'created_at' => NULL,
                'updated_at' => '2021-05-26 00:43:45',
            ),
            11 =>
            array(
                'id' => 13,
                'type' => 'company_mobile_logo',
                'value' => '2021-02-20-6030c88c91911.png',
                'created_at' => NULL,
                'updated_at' => '2021-02-20 17:30:04',
            ),
            12 =>
            array(
                'id' => 14,
                'type' => 'terms_condition',
                'value' => '<p>terms and conditions</p>',
                'created_at' => NULL,
                'updated_at' => '2021-06-11 04:51:36',
            ),
            13 =>
            array(
                'id' => 15,
                'type' => 'about_us',
                'value' => '<p>this is about us page. hello and hi from about page description..</p>',
                'created_at' => NULL,
                'updated_at' => '2021-06-11 04:42:53',
            ),
            14 =>
            array(
                'id' => 16,
                'type' => 'sms_nexmo',
                'value' => '{"status":"0","nexmo_key":"custo5cc042f7abf4c","nexmo_secret":"custo5cc042f7abf4c@ssl"}',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 =>
            array(
                'id' => 17,
                'type' => 'company_email',
                'value' => 'Copy@6amtech.com',
                'created_at' => NULL,
                'updated_at' => '2021-03-15 15:29:51',
            ),
            16 =>
            array(
                'id' => 18,
                'type' => 'colors',
                'value' => '{"primary":"#2a4ce5","secondary":"#14e006"}',
                'created_at' => '2020-10-11 16:53:02',
                'updated_at' => '2023-04-14 13:02:08',
            ),
            17 =>
            array(
                'id' => 19,
                'type' => 'company_footer_logo',
                'value' => '2021-02-20-6030c8a02a5f9.png',
                'created_at' => NULL,
                'updated_at' => '2021-02-20 17:30:24',
            ),
            18 =>
            array(
                'id' => 20,
                'type' => 'company_copyright_text',
                'value' => 'CopyRight 6amTech@2021',
                'created_at' => NULL,
                'updated_at' => '2021-03-15 15:30:47',
            ),
            19 =>
            array(
                'id' => 21,
                'type' => 'download_app_apple_stroe',
                'value' => '{"status":"1","link":"https:\\/\\/www.target.com\\/s\\/apple+store++now?ref=tgt_adv_XS000000&AFID=msn&fndsrc=tgtao&DFA=71700000012505188&CPNG=Electronics_Portable+Computers&adgroup=Portable+Computers&LID=700000001176246&LNM=apple+store+near+me+now&MT=b&network=s&device=c&location=12&targetid=kwd-81913773633608:loc-12&ds_rl=1246978&ds_rl=1248099&gclsrc=ds"}',
                'created_at' => NULL,
                'updated_at' => '2020-12-08 15:54:53',
            ),
            20 =>
            array(
                'id' => 22,
                'type' => 'download_app_google_stroe',
                'value' => '{"status":"1","link":"https:\\/\\/play.google.com\\/store?hl=en_US&gl=US"}',
                'created_at' => NULL,
                'updated_at' => '2020-12-08 15:54:48',
            ),
            21 =>
            array(
                'id' => 23,
                'type' => 'company_fav_icon',
                'value' => '2021-03-02-603df1634614f.png',
                'created_at' => '2020-10-11 16:53:02',
                'updated_at' => '2021-03-02 17:03:48',
            ),
            22 =>
            array(
                'id' => 24,
                'type' => 'fcm_topic',
                'value' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 =>
            array(
                'id' => 25,
                'type' => 'fcm_project_id',
                'value' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 =>
            array(
                'id' => 26,
                'type' => 'push_notification_key',
                'value' => 'Put your firebase server key here.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 =>
            array(
                'id' => 27,
                'type' => 'order_pending_message',
                'value' => '{"status":"1","message":"order pen message"}',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 =>
            array(
                'id' => 28,
                'type' => 'order_confirmation_msg',
                'value' => '{"status":"1","message":"Order con Message"}',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 =>
            array(
                'id' => 29,
                'type' => 'order_processing_message',
                'value' => '{"status":"1","message":"Order pro Message"}',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 =>
            array(
                'id' => 30,
                'type' => 'out_for_delivery_message',
                'value' => '{"status":"1","message":"Order ouut Message"}',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 =>
            array(
                'id' => 31,
                'type' => 'order_delivered_message',
                'value' => '{"status":"1","message":"Order del Message"}',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 =>
            array(
                'id' => 32,
                'type' => 'razor_pay',
                'value' => '{"status":"0","razor_key":null,"razor_secret":null}',
                'created_at' => NULL,
                'updated_at' => '2021-07-06 15:30:14',
            ),
            31 =>
            array(
                'id' => 33,
                'type' => 'sales_commission',
                'value' => '0',
                'created_at' => NULL,
                'updated_at' => '2021-06-11 21:13:13',
            ),
            32 =>
            array(
                'id' => 34,
                'type' => 'seller_registration',
                'value' => '1',
                'created_at' => NULL,
                'updated_at' => '2021-06-05 00:02:48',
            ),
            33 =>
            array(
                'id' => 35,
                'type' => 'pnc_language',
                'value' => '["en"]',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            34 =>
            array(
                'id' => 36,
                'type' => 'order_returned_message',
                'value' => '{"status":"1","message":"Order hh Message"}',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            35 =>
            array(
                'id' => 37,
                'type' => 'order_failed_message',
                'value' => '{"status":null,"message":"Order fa Message"}',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            36 =>
            array(
                'id' => 40,
                'type' => 'delivery_boy_assign_message',
                'value' => '{"status":0,"message":""}',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            37 =>
            array(
                'id' => 41,
                'type' => 'delivery_boy_start_message',
                'value' => '{"status":0,"message":""}',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            38 =>
            array(
                'id' => 42,
                'type' => 'delivery_boy_delivered_message',
                'value' => '{"status":0,"message":""}',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            39 =>
            array(
                'id' => 43,
                'type' => 'terms_and_conditions',
                'value' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            40 =>
            array(
                'id' => 44,
                'type' => 'minimum_order_value',
                'value' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            41 =>
            array(
                'id' => 45,
                'type' => 'privacy_policy',
                'value' => '<p>my privacy policy</p>

<p>&nbsp;</p>',
                'created_at' => NULL,
                'updated_at' => '2021-07-06 14:09:07',
            ),
            42 =>
            array(
                'id' => 46,
                'type' => 'paystack',
                'value' => '{"status":"0","publicKey":null,"secretKey":null,"paymentUrl":"https:\\/\\/api.paystack.co","merchantEmail":null}',
                'created_at' => NULL,
                'updated_at' => '2021-07-06 15:30:35',
            ),
            43 =>
            array(
                'id' => 47,
                'type' => 'senang_pay',
                'value' => '{"status":"0","secret_key":null,"merchant_id":null}',
                'created_at' => NULL,
                'updated_at' => '2021-07-06 15:30:23',
            ),
            44 =>
            array(
                'id' => 48,
                'type' => 'currency_model',
                'value' => 'single_currency',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            45 =>
            array(
                'id' => 49,
                'type' => 'social_login',
                'value' => '[{"login_medium":"google","client_id":"","client_secret":"","status":""},{"login_medium":"facebook","client_id":"","client_secret":"","status":""}]',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            46 =>
            array(
                'id' => 50,
                'type' => 'digital_payment',
                'value' => '{"status":"1"}',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            47 =>
            array(
                'id' => 51,
                'type' => 'phone_verification',
                'value' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            48 =>
            array(
                'id' => 52,
                'type' => 'email_verification',
                'value' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            49 =>
            array(
                'id' => 53,
                'type' => 'order_verification',
                'value' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            50 =>
            array(
                'id' => 54,
                'type' => 'country_code',
                'value' => 'BD',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            51 =>
            array(
                'id' => 55,
                'type' => 'pagination_limit',
                'value' => '10',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            52 =>
            array(
                'id' => 56,
                'type' => 'shipping_method',
                'value' => 'inhouse_shipping',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            53 =>
            array(
                'id' => 57,
                'type' => 'currency_symbol_position',
                'value' => 'right',
                'created_at' => '2023-04-14 12:56:21',
                'updated_at' => '2023-04-14 12:56:25',
            ),
            54 =>
            array(
                'id' => 58,
                'type' => 'timezone',
                'value' => 'UTC',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            55 =>
            array(
                'id' => 59,
                'type' => 'maintenance_mode',
                'value' => '0',
                'created_at' => '2023-05-18 07:58:52',
                'updated_at' => '2023-05-18 07:58:56',
            ),
        ));
    }
}
