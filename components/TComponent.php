<?php

namespace app\components;
use app\models\translate\Lang;
use app\models\translate\LangValue;
use Yii;
use yii\base\Component;
use yii\web\HttpException;

class TComponent extends Component{

    public $langList = [];
    public $translate = [];
    public $defaultLang = 'en';
    public $curentLang = 'en';
    public $lang = [];

    function __construct(){
        $cookies = Yii::$app->request->cookies;

        //Из браузера
        $this->curentLang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);


        //Если есть в GET язык,  установим в качестве текущего.
        if(!empty($_GET['lang'])){
            $this->curentLang = htmlspecialchars($_GET['lang']);
        }else{
            //Если нет,  пробуем взять из куков
            if(!empty($_COOKIE['language'])){
                $this->curentLang = $_COOKIE['language'];
            }
        }

        $this->lang = Lang::getByCode($this->curentLang);
        if(!$this->lang){
            $this->lang = Lang::getByCode($this->defaultLang);
        }

        //Запишем в куки переменную ланг
        setcookie("language", $this->lang['code'], time()+3600 * 1000);  /* срок действия 1 час */


        //Получаем коды с дефолтными значениями
        //Получаем перевод и переопределяем
        $this->translate = LangValue::getList($this->lang['id']);
    }

    function getActiveLang(){
        if(empty($this->langList)){
                $this->langList = Lang::getActive();
        }
        return $this->langList;
    }




    function getT($code,$defaultValue){
        if(!isset($this->translate[$code])){
            //Создать переменную в бд
            LangValue::createItem($code,$defaultValue);
            $this->translate[$code] = $defaultValue;
            //return $defaultValue;
        }
        return $this->translate[$code];
    }

}