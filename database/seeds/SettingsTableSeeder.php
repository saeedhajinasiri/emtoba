<?php

use App\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::statement('TRUNCATE TABLE `settings`');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        $this->set('site_title', 'بیس نرم افزار');
        $this->set('site_keywords', 'بیس نرم افزار', 'textarea');
        $this->set('site_description', 'بیس نرم افزار', 'textarea');
        $this->set('address', 'تهران');
        $this->set('email', 'info@baseapp.com');
        $this->set('site', 'http://baseapp.com');
        $this->set('tel', '021-12345678');
        $this->set('facebook_url', 'https://facebook.com/baseapp');
        $this->set('telegram_url', 'https://telegram.com/baseapp');
        $this->set('instagram_url', 'https://twitter.com/baseapp');
    }

    public function set($key, $value, $type = 'text')
    {
        $field = Setting::where('key', $key)->first();

        if (!isset($field)) {
            $field = new Setting();
            $field->key = $key;
        }
        $field->value = $value;
        $field->type = $type;
        $field->save();
    }
}
