<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StaticOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        set_static_option('company_name', null);
        set_static_option('company_motto', null);
        set_static_option('company_email', '');
        set_static_option('company_phone', null);
        set_static_option('company_address', null);
        set_static_option('company_website_address', null);
        set_static_option('website_footer_credit', null);

        set_static_option('website_logo', null);
        set_static_option('favicon', null);
        set_static_option('meta_image', null);

        set_static_option('company_facebook_page_sms_script', '');

        set_static_option('no_image', 'uploads/images/setting/no-image.png'); //Enable | Disable
    }
}
