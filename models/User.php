<?php

namespace app\models;

use app\models\translate\PropsTranslate;
use app\models\translate\UserTranslate;
use app\models\user\Props;
use app\models\user\Vcard;
use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use app\models\Files;

class User extends ActiveRecord implements IdentityInterface
{

    static $active = [
        'Y' => 'Active',
        'N' => 'Inactive',
        'B' => 'Block'
    ];


    private $translations = [];

    public $props = null;


    public static function tableName()
    {
        return 'users';
    }


    /**
     * Finds an identity by the given ID.
     *
     * @param string|int $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @param string $authKey
     * @return bool if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }


    //Get User photo
    public function getPhoto()
    {
        return $this->hasOne(Files::className(), ['id' => 'photo_id']);
    }


    //Get Department
    public function getDepartment()
    {
        return $this->hasOne(Department::className(), ['id' => 'dep_id']);
    }

    //Get Department
    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['id' => 'company_id']);
    }



    //Save item
    function saveItem($item = [])
    {

        if (!empty($item)) {


            //Удалим старый VC
            @unlink($_SERVER['DOCUMENT_ROOT'] . '/web' . $this->vCard);

            if (isset($item['main_email'])) {
                $this->main_email = htmlspecialchars($item['main_email']);
            }

            if (isset($item['prefixName'])) {
                $this->prefixName = htmlspecialchars($item['prefixName']);
            }

            if (isset($item['suffixName'])) {
                $this->suffixName = htmlspecialchars($item['suffixName']);
            }

            if (isset($item['birthday'])) {
                $this->birthday = htmlspecialchars($item['birthday']);
            }

            if (isset($item['firstName'])) {
                $this->firstName = htmlspecialchars($item['firstName']);
            }

            if (isset($item['lastName'])) {
                $this->lastName = htmlspecialchars($item['lastName']);
            }

            if (isset($item['note'])) {
                $this->note = htmlspecialchars($item['note']);
            }


            if (isset($item['calendar_link'])) {
                $this->calendar_link = htmlspecialchars($item['calendar_link']);
            }

            if (isset($item['role'])) {
                $this->role = $item['role'];
            }

            if (Yii::$app->user->identity->isSuperAdmin == 'Y') {
                if (isset($item['dep_id'])) {
                    $this->dep_id = $item['dep_id'];
                }

                if (isset($item['company_id'])) {
                    $this->company_id = $item['company_id'];
                }


                if (isset($item['active'])) {
                    $this->active = $item['active'];
                }

                if (isset($item['alias'])) {
                    $this->alias = $item['alias'];
                }

                if ($item['accessEdit'] == 'N') {
                    $this->accessEdit = 'N';
                } else {
                    $this->accessEdit = 'Y';
                }

                if ($item['isActivated'] == 'N') {
                    $this->isActivated = 'N';
                } else {
                    $this->isActivated = 'Y';
                }
            }



            if (empty($this->uid)) {
                $this->uid = Yii::$app->security->generateRandomString();
            }


            if (!empty($item['new_password'])) {
                //Ставим новый пароль
                $this->password = Yii::$app->getSecurity()->generatePasswordHash($item['new_password']);
            }

            if (empty($this->alias)) {
                $this->alias = Yii::$app->security->generateRandomString();
            }


            $this->save();
            $this->photo_id = Files::saveFile('photo', '/profile/' . $this->id, $this->photo_id);

            //Save translate
            UserTranslate::saveUser($this->id, $_POST['langUser']);
            $this->save();

            //Save user props
            Props::savePropsInUserFromPost($this->id);

            //Generation card
            if (!empty($this->firstName) || !empty($this->lastName)) {
                $this->saveVcard();
            }
        }
        return false;
    }


    //List of controlled departments
    public function controlListDep()
    {
    }

    public function saveVcard()
    {
        $vcard = new vCard();
        $vcard->setName($this->lastName, $this->firstName);
        //->setNickname($user->org->name);

        if (!empty($this->photo->src) && file_exists($_SERVER['DOCUMENT_ROOT'] . '/web' . $this->photo->src)) {
            $vcard->setImage($_SERVER['DOCUMENT_ROOT'] . '/web' . $this->photo->src);
        }


        $phones = $this->getProps('phone');
        foreach ($phones as $phone) {
            $vcard->setPhone(str_replace([' ', '+', '‭'], ['', '', ''], $phone['value']), Props::$fields['phone']['type'][$phone['type']]);
        }

        $vcard->setUrl('https://' . $_SERVER['SERVER_NAME'] . '/assets/' . $this->uid . '/', 'eCard');

        if (!empty($this->calendar_link)) {
            $vcard->setUrl($this->calendar_link, 'Calendar');
        }

        $websites = $this->getProps('website');
        foreach ($websites as $website) {
            $vcard->setUrl($website['value']);
        }

        $emails = $this->getProps('email');
        foreach ($emails as $email) {
            $vcard->setEmail($email['value'], Props::$fields['email']['type'][$email['type']]);
        }

        $address = $this->getProps('address');
        foreach ($address as $addres) {
            $curentAddress = unserialize($addres['value']);
            $curAdr = [];

            if ($curentAddress['street']) {
                $curAdr[] = $curentAddress['street'];
            }

            if ($curentAddress['address']) {
                $curAdr[] = $curentAddress['address'];
            }

            if ($curentAddress['index']) {
                $curAdr[] = $curentAddress['index'];
            }

            if ($curentAddress['country']) {
                $curAdr[] = $curentAddress['country'];
            }

            $vcard->setOther('ADR;TYPE=' . $addres['type'] . ':;;' . $curentAddress['street'] . ';' . $curentAddress['address'] . ';;' . $curentAddress['index'] . ';' . $curentAddress['country']);
            //if(!empty($curAdr)){
            //$vcard->setOther('LABEL;TYPE='.$addres['type'].':'.implode(', ',$curentAddress));
            //}
        }


        $websites = $this->getProps('socialmedia');
        foreach ($websites as $website) {
            $vcard->setUrl($website['value'], Props::$fields['socialmedia']['type'][$website['type']]);
        }



        //Должность
        if (!empty($this->role)) {
            $vcard->setOther('TITLE:' . $this->role);
        }

        if (!empty($this->note)) {
            $vcard->setOther('NOTE:' . $this->note);
        }


        if (!empty($this->company)) {
            //Organization
            $vcard->setOther('ORG:' . $this->company->name);
        }

        //Logo Компании
        if (!empty($this->company->logo->src) && file_exists($_SERVER['DOCUMENT_ROOT'] . '/web' . $this->company->logo->src)) {
            //$vcard->setLogo($_SERVER['DOCUMENT_ROOT'].'/web'.$this->company->logo->src);
        }

        $vCnameFile = '/uploads/vc/' . $this->id . '-' . $this->firstName . $this->lastName . '-' . time() . '.vcf';
        $vCnameFile = str_replace(' ', '', $vCnameFile);
        $vcFile = $_SERVER['DOCUMENT_ROOT'] . '/web' . $vCnameFile;
        @unlink($vcFile);
        $this->vCard = $vCnameFile;
        //Сохраним новый VC
        file_put_contents($vcFile, $vcard->getContent());
        $this->save();
    }

    function getProps($name = null)
    {
        if (empty($this->props)) {
            $propsList = Props::getPropsUser($this->id);
            foreach ($propsList as $prop) {
                $props[$prop['name']][] = ['value' => $prop['value'], 'type' => $prop['type'], 'id' => $prop['id'], 'translate' => PropsTranslate::getValues($prop['id'])];
                //Получаем перевод свойства


            }
            $this->props = $props;
        }

        if (is_null($name)) {
            return $this->props;
        } else {
            if (!empty($this->props[$name])) {
                return $this->props[$name];
            } else {
                return [];
            }
        }
    }



    function getTranslate($lang = 1, $field = 'firstName', $default = '')
    {
        $this->getLangValueUser();

        if (empty($this->translations[$lang][$field])) {
            return $default;
        }

        return $this->translations[$lang][$field];
    }

    function getLangValueUser()
    {
        if (empty($this->translations)) {
            $this->translations = UserTranslate::getValues($this->id);
        }
    }


    /*

    function beforeSave($insert){
        if(empty($this->alias)){
            $this->alias = Yii::$app->security->generateRandomString();
        }
        parent::beforeSave($insert);
    }*/
}
