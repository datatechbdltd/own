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
        set_static_option('frontend_style', 'Second Style');// Default Style | Second Style

        set_static_option('contact_heading', 'GET IN TOUCH');
        set_static_option('contact_highlight', 'Ready to Get Started?');
        set_static_option('contact_description', 'Give us a call or drop by anytime, we endeavour to  answer all enquiries within 24 hours on business days');

        set_static_option('reporting_email', 'datatechbdltd@gmail.com');
        set_static_option('reporting_phone', '01304734623');

        set_static_option('company_facebook_link', 'facebook.com');
        set_static_option('company_linkedin_link', 'linkedin.com');
        set_static_option('company_twitter_link', 'twitter.com');
        set_static_option('company_github_link', 'github.com');
        set_static_option('company_instagram_link', 'instagram.com');
        set_static_option('company_whatsapp_link', 'whatsapp.com');

        set_static_option('call_to_action', 'MORE WITH US');
        set_static_option('call_to_action_highlight', 'You Want to Showcase Your Busniess');

        set_static_option('company_name', 'DataTech Bd');
        set_static_option('company_motto', 'We make your desired');
        set_static_option('company_email', 'info@datatechbd.com');
        set_static_option('company_phone', '01234567890');
        set_static_option('company_address', 'address');
        set_static_option('company_address_district_country', 'Dhaka,Bangladesh');
        set_static_option('company_website_address', 'datatechbd.com');
        set_static_option('website_footer_credit', 'DataTech bd');

        set_static_option('website_logo', null);
        set_static_option('website_favicon', null);

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

        set_static_option('real_members', 'REAL NUMBERS');
        set_static_option('counter_highlight', 'Expect Great Things from Your SEO Agency');
        set_static_option('counter_image', null);
        set_static_option('counter_description', 'We know how important customer experience is for a busines and therefore, we trive to make your company excel in this.');
        set_static_option('active_clients', 'Active Clients');
        set_static_option('active_clients_number', '330');
        set_static_option('team_advisors', 'Team Advisors');
        set_static_option('team_advisors_number', '85');
        set_static_option('projects_done', 'Projects Done');
        set_static_option('projects_done_number', '850');
        set_static_option('glorious_years', 'Glorious Years');
        set_static_option('glorious_years_number', '15');


        set_static_option('team_title', 'Profectional Team');
        set_static_option('team_highlight', 'Meet Our Leadership Team');
        set_static_option('team_description', 'If we had a ‘secret sauce’ it would be our awesome people.We have only professional team!');



        set_static_option('footer_text', 'Our approach to SEO is uniquely built around');
        set_static_option('subscribe_text', 'Gur future updates! Get Subscribed now!');

        set_static_option('custom_website_head_script', '');
        set_static_option('custom_website_foot_script', '');
        set_static_option('is_bulk_import_from_website', 'yes');// yes | no
        set_static_option('is_active_website_contact_submission_mail_to_visitor', 'yes'); //yes or no
        set_static_option('is_active_website_contact_submission_sms_to_visitor', 'yes'); //yes or no
        set_static_option('is_active_website_contact_submission_sms_to_office', 'yes'); //yes or no

        set_static_option('no_image', 'uploads/images/setting/no-image.png');
        set_static_option('sample_leads', 'uploads/samples/sample-leads-of-datatech-bd-ltd.xlsx');
        set_static_option('sample_leads_with_category', 'uploads/samples/sample-leads-with-category-of-datatech-bd-ltd.xlsx');


    }
}
