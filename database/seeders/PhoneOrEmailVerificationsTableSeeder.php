<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PhoneOrEmailVerificationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('phone_or_email_verifications')->delete();
        
        
        
    }
}