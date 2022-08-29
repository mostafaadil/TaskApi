<?php


namespace App\Creationl;


class  ArabicLang
{
    private $lang;

   


    public function getLang()
    {
        return [
            "home" => "الرئيسية",
            'cpanel' => 'لوحة التحكم',
            'title' => "القائمة الرئيسية",
            'signout' => "تسجيل الخروج",
            "users_management" => "ادارة المستخدمين ",
            "events" => "الفعاليات ",
            "projects" => "المشاريع",
            "news" => "الاخبار ",
            "contacts" => " طرق التواصل",
            "reports" => "الاخبار",
            "location"=>"الموقع",
            "phase"=>"ادخل عدد المراحل  التي ترغب في اضافتها",
            "english"=>"الانجليزية",
            "arabic"=>"العربية ",
            "lang"=>"اللغة",
            "phases"=>"المراحل",
            "progress"=>"تحت السير",
            "completed"=>"المكتملة",
            "donets_now" => "تبرع الان",
            "save"=>"حفظ",
            "cover_photo" => "الصورة الرئيسية"
        
        ];
        
    }
}
