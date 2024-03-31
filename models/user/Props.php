<?php

namespace app\models\user;

use app\models\translate\PropsTranslate;
use Yii;
use yii\web\Request;
use yii\db\ActiveRecord;


class Props extends \yii\db\ActiveRecord{

    static $fields = [
        'phone'=> [
            'name' => 'phone',
            'placeholder' => 'Phones',
            'type' => [
                'cell'=>'Mobile phone','work'=>'Work phone','home'=>'Home phone'
            ],
            'multiple' => true,
            'active' => true
        ],
        'website' => [
            'name' => 'website',
            'placeholder' => 'Websites',
            'multiple'=> true,
            'active' => true
        ],
        'email'=>[
            'name' => 'email',
            'placeholder' => 'Email addresses',
            'type' => [
                'private'=>'Private','worker'=>'Work','other'=>'Other'
            ],
            'multiple'=> true,
            'active' => true
        ],
        'address' => [
            'name' => 'address',
            'placeholder' => 'Addresses',
            'type' => [
                'dom'=>'Local','intl'=>'International','postal'=>'For letters','home'=>'Place of residence','work'=>'Place of work'
            ],
            'multiple'=> true,
            'active' => true
        ],
        'socialmedia' => [
            'name' => 'socialmedia',
            'placeholder' => 'Social media',
            'type' => [
                'facebook'=>'Facebook','linkedin'=>'LinkedIn','instagram'=>'Instagram','twitter'=>'Twitter','youtube'=>'YouTube','tiktok'=>'TikTok','whatsapp'=>'WhatsApp','snapchat'=>'Snapchat','telegram'=>'Telegram','viber'=>'Viber','skype'=>'Skype'
            ],
            'multiple'=> true,
            'active' => true
        ],
        'calendar' => [
            'name' => 'calendar',
            'placeholder' => 'Link to calendar',
            'multiple'=> false,
            'active' => true
        ],
        'youtube_link' => [
            'name' => 'youtube_link',
            'placeholder' => 'Insert video',
            'text_help'=> 'YouTube link',
            'multiple'=> true,
            'active' => true
        ],
        'file' => [
            'name' => 'file',
            'placeholder' => 'Files',
            'text_help'=> 'Allowed formats .pdf',
            'multiple'=> true,
            'active' => false
        ]
    ];



    public static function tableName(){
        return 'user_props';
    }


    static function savePropsInUserFromPost($user_id){
        self::clearProps($user_id);
        PropsTranslate::cleanTranslate($user_id);

        $iCountAddress = 0;

        foreach (self::$fields as $name=>$field){
            //Если у нас переданы значения
            if(!empty($_POST['user_'.$name])){
                if(!$field['multiple']){
                    $prop = new self();
                    $prop->user_id = $user_id;
                    $prop->name = $name;
                    $prop->value = htmlspecialchars(trim($_POST['user_'.$name]));
                    $prop->save();
                }else{
                    foreach ($_POST['user_'.$name] as $postItem){
                        if(!empty($postItem[$name])){
                            $prop = new self();
                            $prop->user_id = $user_id;
                            $prop->name = $name;

                            if($name == 'address'){
                                $prop->value = serialize($postItem);
                            }else{
                                $prop->value = htmlspecialchars(trim($postItem[$name]));
                            }

                            $prop->type = (!empty($postItem['type'] && !empty($field['type'][$postItem['type']])) ? $postItem['type'] : null);
                            $prop->save();


                            if($name == 'address'){
                                if(!empty($_POST['langAddress'][$iCountAddress])){
                                    foreach ($_POST['langAddress'][$iCountAddress] as $langId=>$value){
                                        PropsTranslate::saveProps($prop->id,$user_id,$langId,serialize($value));
                                    }
                                }
                                $iCountAddress++;
                            }

                        }
                    }
                }
            }
        }
    }

    static function clearProps($user_id){
        $sql = "DELETE FROM `".self::tableName()."` WHERE `user_id` = '".$user_id."'";
        Yii::$app->db->CreateCommand($sql)->execute();
    }

    static function getPropsUser($user_id = null,$name = null){
        $where['user_id'] = $user_id;
        if(!is_null($name)){
            $where['name'] = $name;
        }
        return self::find()->where($where)->all();
    }



}
