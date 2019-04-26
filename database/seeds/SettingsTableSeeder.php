<?php

use App\Setting;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->set('site_title', 'دفتر ابزارآلات');
        $this->set('name', 'دفتر ابزارآلات');
        $this->set('address', 'تهران - میدان حسن آباد');
        $this->set('email', 'info@tools.com');
        $this->set('site', 'http://tools.com');
        $this->set('tel', '021-12345678');
        $this->set('fax', '021-12345678');
        $this->set('contact_email', 'me@tools.com');
        $this->set('facebook_url', 'https://facebook.com/tools');
        $this->set('telegram_url', 'https://telegram.com/tools');
        $this->set('instagram_url', 'https://twitter.com/tools');
    }

    public function set($key, $value)
    {
        $field = Setting::where('key', $key)->first();

        if (!isset($field)) {
            $field = new Setting();
            $field->key = $key;
        }
        $field->value = $value;
        $field->save();
    }
}
