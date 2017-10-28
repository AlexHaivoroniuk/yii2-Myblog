<?php

namespace app\models;

use Yii;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $email
 * @property string $username
 * @property string $auth_key
 * @property string $code
 * @property integer $active
 * @property string $password
 */
class User extends ActiveRecord implements IdentityInterface
{
    const ACTIVE_USER = 1;
//    public $password;
    public $rememberMe = false;

    private $_user = false;


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'username', 'password'], 'required', 'on' => 'register'],
            [['active'], 'integer'],
            [['email', 'username', 'auth_key', 'code', 'password'], 'string', 'max' => 255],
            [['auth_key', 'code'],'safe'],
            ['rememberMe', 'boolean'],
            [['email', 'password'], 'required', 'on' => 'login'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'email' => 'Email',
            'username' => 'Username',
            'password' => 'Password',
            'rememberMer' => 'Remember Me'
        ];
    }

    /**
     *
     * Отправка писма с потверждением регистрации
     *
     * @return mixed
     */
    // Функция генирации и отправки письма для потверждения E-mail
    public function sendConfirmationLink()
    {

        $confirmationLinkUrl = Url::to(['site/confirmemail', 'email'=>$this->email, 'code'=>$this->code]);
        $confirmationLink = Html::a('Confirm Email', $confirmationLinkUrl);


        $sendingResult = Yii::$app->mailer->compose()
            ->setFrom(Yii::$app->params['adminEmail'])
            ->setTo($this->email)
            ->setSubject('Please, confirm your e-mail')
            ->setTextBody('In order finishing you registration You need to confirm your e-mail by using following link: ' . $confirmationLinkUrl)
            ->setHtmlBody('<p>In order finishing you registration You need to confirm your e-mail by using following link:</p>' . $confirmationLink)
            ->send();

        return $sendingResult;
    }



    // Ищим пользователя по id
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
         return static::findOne(['access_token' => $token]);
    }

    // Ищим пользователя по E-mail и проверяем потверждён ли аккаунт
    public static function findByUsername($email)
    {
        return static ::findOne(['email' => $email, 'active' =>self::ACTIVE_USER]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    // Проверяем пароль, каторый вёл пользователь
    public function validatePassword($password)
    {


        //  return $this->password === $password;
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    // Генерируем рандомную строку
    public function generateAuthKey()
    {
        $this -> auth_key = Yii::$app->security->generateRandomString();
    }


    public function login()
    {
        $this->scenario = 'login';
        if ($this->validate()) {

            if ($this->rememberMe)
            {
                $cookie = $this->getUser();
                $cookie->generateAuthKey();
                $cookie->save();

            }
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
        }

        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {

            $this->_user = $this->findByUsername($this->email);
        }
        return $this->_user;
    }



}
