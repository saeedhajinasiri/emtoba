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

        $this->set('institute_registered_capital', '1,000,000,000,000 میلیارد ریال');
        $this->set('registration_number', '35497');
        $this->set('judicial_identifier', '14004745509');

        $this->set('address', 'تهران بزرگراه چمران شمال به جنوب (تقاطع اوین) ، خیابان شهید سوری (روبروی درب اصلی شهرک آتی ساز) ، نبش کوچه مریم ، پلاک 2/1 ، طبقات 1 و 2 ،واحدهای 1 الی 4');
        $this->set('email', 'emtoba@vmail.ir');
        $this->set('tel', '22347229-021 , 28425599-021');
        $this->set('work_hours', 'شنبه تا چهار شنبه : 9:00 - 18:00');
        $this->set('postal_code', '1997658435');
        $this->set('fax', '89789994-021');

        $this->set('elearning_center_url', '/toba-elearning-center');
        $this->set('counselors_contact_url', '/');
        $this->set('telegram_registering_url', '/');
        $this->set('toba_center_url', '/');
        $this->set('mohta_holding', 'copy.png', 'image');
        $this->set('red_line_text', 'بر اساس سنوات سالانه مرکز مشاوران حقوقی طوبی
خدمات ويژه به موکلين: خانواده معظم شهداء وجانبازان ، نيروهای مسلح و پرسنل و ماموران اطلاعات و امنيتی (کميسيون انتظامی ونظامی)
درخصوص مباحث ديوان عالی کشور و ديوان عدالت اداری ارائه می گردد', 'textarea');
        $this->set('grey_line_text', 'موسسه مشاوران حقوقی طوبی (مرکز)
بزرگترین ، مجربترین مرکز حقوقی در سطح کشور ، با 69 وکیل مجرب و کارآمد و 59 کارمند (کارشناس و کارشناس ارشد حقوق و فقه)
هدفمند پیگیر موارد قضایی و حقوقی شما هستیم.', 'textarea');

        $this->set('first_box_title', 'وکالت و مشاوره تخصصی کلیه دعاوی');
        $this->set('first_box_content', ' وکالت و مشاوره تخصصی کلیه دعاوی ملکی، سرقفلی و حق کسب و پیشه در تهران و تمام استان ها با نمونه پرونده های موفق توسط وکلای موسسه', 'textarea');
        $this->set('second_box_title', 'رفع تصرف اراضی املاک ومستغلات');
        $this->set('second_box_content', 'رفع تصرف اراضی املاک ومستغلات از سوی سازمان ها، ارگان ها، بنیاد، نهاد های دولتی و امور مرتبط', 'textarea');
        $this->set('third_box_title', 'تخصص در امور دیوان عدالت اداری و دیوان عالی');
        $this->set('third_box_content', 'تخصص در امور دیوان عدالت اداری (آرای کمیسیون ماده 100 شهرداری، اعاده به خدمت، آرای کمیسیون شورای کار، تامین اجتماعی)', 'textarea');
        $this->set('fourth_box_title', 'دادگاه خانواده');
        $this->set('fourth_box_content', 'امور مهریه، نفقه ( حال، آینده و گذشته )، نفقه زوجه واولاد، اجرت المثل و دیگر امور مرتبط', 'textarea');

        $this->set('video_title', 'سخنان رهبری');
        $this->set('video_url', '<div id="15544669474106678"> <script type="text/JavaScript" src="https://www.aparat.com/embed/LokgN?data[rnddiv]=15544669474106678&data[responsive]=yes"></script> </div>', 'textarea');
        $this->set('google_map_address', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6473.168862135677!2d51.38633724105314!3d35.785583237104476!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzXCsDQ3JzAzLjYiTiA1McKwMjMnMTguNSJF!5e0!3m2!1sen!2snl!4v1500465186233" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>', 'textarea');

        $this->set('first_percentage_title', 'کیفیت مشاوره های موسسه');
        $this->set('first_percentage_value', '100');
        $this->set('second_percentage_title', 'موفقیت در پرونده های موسسه به نفع له موکل');
        $this->set('second_percentage_value', '87');
        $this->set('third_percentage_title', 'رضایت و اعتماد موکلین');
        $this->set('third_percentage_value', '100');
        $this->set('fourth_percentage_title', 'پشتیبانی از طرف موسسه');
        $this->set('fourth_percentage_value', '100');

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
