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
        set_static_option('level_title', 'Take a Business to Next Level!');
        set_static_option('level_video_link', 'https://www.youtube.com/watch?v=kxPCFljwJws');
        set_static_option('level_image', null);
        set_static_option('who_we_are', 'WHO WE ARE');
        set_static_option('seo_highlight', 'Our Mission is to change
Your View for SEO');
        set_static_option('seo_description', 'Smratseo is a brand of digital agency. Competen novate synergstic vortas through forward strategic theme areas Compelling extend super was that Proactive myocardinate vertical strategic');
        set_static_option('our_service', 'Our Services');
        set_static_option('service_highlight', 'You Take Growth For Business');
        set_static_option('service_description', 'Our strategy includes consistently evolving, to ensure we’re
producing exceptional SEO for business.');
        set_static_option('service_link', '#');
        set_static_option('seo_image', null);
        set_static_option('favicon', null);
        set_static_option('meta_image', null);

        set_static_option('company_facebook_page_sms_script', '');

        set_static_option('no_image', 'uploads/images/setting/no-image.png'); //Enable | Disable
    }
}
