<?php

namespace Database\Seeders\Admin;

use App\Models\Admin\BasicSettings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BasicSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'site_name'         => "Crypinvest",
            'site_title'        => "Invest And Safe Your Money",
            'base_color'        => "#F26822",
            'secondary_color'   => "#262626",
            'otp_exp_seconds'   => "3600",
            'timezone'          => "Asia/Dhaka",
            'broadcast_config'  => [
                "method" => "pusher", 
                "app_id" => "1574360", 
                "primary_key" => "971ccaa6176db78407bf", 
                "secret_key" => "a30a6f1a61b97eb8225a", 
                "cluster" => "ap2" 
            ],
            'push_notification_config'  => [
                "method" => "pusher", 
                "instance_id" => "fd7360fa-4df7-43b9-b1b5-5a40002250a1", 
                "primary_key" => "6EEDE8A79C61800340A87C89887AD14533A712E3AA087203423BF01569B13845"
            ],
            'kyc_verification'  => true,
            'mail_config'       => [
                "method" => "smtp", 
                "host" => "appdevs.net",
                "port" => "465", 
                "encryption" => "ssl",
                "username" => "noreply@appdevs.net",
                "password" => "QP2fsLk?80Ac",
                "from" => "noreply@appdevs.net", 
                "app_name" => "Crypinvest",
            ],
            'email_verification'    => true,
            'site_logo_dark'        => "seeder/dark-logo.webp",
            'site_logo'             => "seeder/white-logo.webp",
            'site_fav_dark'         => "seeder/dark-fav.webp",
            'site_fav'              => "seeder/white-fav.webp",
            'web_version'           => "2.0.3",
        ];

        BasicSettings::firstOrCreate($data);
    }
}
