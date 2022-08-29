<?php

namespace App\Creationl;

use Illuminate\Contracts\Session\Session;
use App\Creationl\ArabicLang;
use App\Creationl\EnglishLang;

class  LangSwithcer
{

    private $lang;
    function __construct($lang)
    {
        $this->lang = $lang;
       // session()->put('locale', $this->lang);
    }

    public function switchLang()
    {
        if (session()->get('locale') == "ar") {

            $arbic = new ArabicLang;
            $this->arbic->getLang();
        } else {
            //   return EnglishLnag::getLang();
            $english = new EnglishLang;
             return $english->getLang();

        }
    }
}
