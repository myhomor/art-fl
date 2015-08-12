<?php

namespace app\modules\user\models;

use Yii;
use yii\base\NotSupportedException;
use yii\helpers\Security;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "core_users".
 *
 * @property integer $ID
 * @property string $LOGIN
 * @property string $PASSWORD
 * @property string $PASSWORD_HASH
 * @property string $AUTH_KEY
 * @property string $PASSWORD_RESET_TOKEN
 * @property string $EMAIL
 * @property string $EMAIL_CONFIRM_TOKEN
 * @property integer $PERSONAL_AVATAR
 * @property string $PERSONAL_NAME
 * @property string $PERSONAL_LASTNAME
 * @property string $PERSONAL_COMPANY
 * @property string $PERSONAL_STATUS
 * @property string $PERSONAL_BDAY
 * @property string $PERSONAL_ABOUT_TEX
 * @property integer $PERSONAL_SOUL_PLUS
 * @property integer $PERSONAL_SOUL_MINUS
 * @property string $ACTIVE
 * @property string $LAST_LOGIN
 * @property string $DATE_REGISTER
 * @property integer $ID_CONTACT
 * @property integer $ID_COUNTRY
 * @property integer $ID_CITY
 * @property integer $ID_PROFILE_FLANCE
 * @property integer $ID_PROFILE_CUSTOMER
 * @property integer $ID_PROFILE_ACTIVE
 * @property integer $ID_CURRENCY
 * @property integer $ID_LANG
 * @property string $FREND_LIST
 * @property integer $ID_STATUS
 * @property integer $ID_ROLE
 */
class AuthUsers extends ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
	const STATUS_BLOCKED = 'B';
    const STATUS_ACTIVE = 'Y';
    const STATUS_WAIT = 'N'; 
	public $username;
    public static function tableName()
    {
        return 'core_users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LOGIN', 'PASSWORD', 'PASSWORD_HASH', 'AUTH_KEY', 'PASSWORD_RESET_TOKEN', 'EMAIL', 'EMAIL_CONFIRM_TOKEN', 'PERSONAL_AVATAR', 'PERSONAL_NAME', 'PERSONAL_LASTNAME', 'PERSONAL_COMPANY', 'PERSONAL_STATUS', 'PERSONAL_BDAY', 'PERSONAL_ABOUT_TEX', 'PERSONAL_SOUL_PLUS', 'PERSONAL_SOUL_MINUS', 'LAST_LOGIN', 'DATE_REGISTER', 'ID_CONTACT', 'ID_COUNTRY', 'ID_CITY', 'ID_CURRENCY', 'ID_LANG', 'FREND_LIST', 'ID_STATUS', 'ID_ROLE'], 'required'],
            [['PASSWORD', 'PASSWORD_HASH', 'PERSONAL_ABOUT_TEX', 'FREND_LIST'], 'string'],
            [['PERSONAL_AVATAR', 'PERSONAL_SOUL_PLUS', 'PERSONAL_SOUL_MINUS', 'ID_CONTACT', 'ID_COUNTRY', 'ID_CITY', 'ID_CURRENCY', 'ID_LANG', 'ID_STATUS', 'ID_ROLE'], 'integer'],
            [['PERSONAL_BDAY', 'LAST_LOGIN', 'DATE_REGISTER'], 'safe'],
            [['LOGIN', 'EMAIL'], 'string', 'max' => 50],
            [['AUTH_KEY'], 'string', 'max' => 265],
            [['PASSWORD_RESET_TOKEN', 'EMAIL_CONFIRM_TOKEN'], 'string', 'max' => 256],
            [['PERSONAL_NAME', 'PERSONAL_LASTNAME', 'PERSONAL_COMPANY'], 'string', 'max' => 250],
            [['PERSONAL_STATUS'], 'string', 'max' => 150],
            [['ACTIVE'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'LOGIN' => 'Login',
            'PASSWORD' => 'Password',
            'PASSWORD_HASH' => 'Password  Hash',
            'AUTH_KEY' => 'Auth  Key',
            'PASSWORD_RESET_TOKEN' => 'Password  Reset  Token',
            'EMAIL' => 'Email',
            'EMAIL_CONFIRM_TOKEN' => 'Email  Confirm  Token',
            'PERSONAL_AVATAR' => 'Personal  Avatar',
            'PERSONAL_NAME' => 'Personal  Name',
            'PERSONAL_LASTNAME' => 'Personal  Lastname',
            'PERSONAL_COMPANY' => 'Personal  Company',
            'PERSONAL_STATUS' => 'Personal  Status',
            'PERSONAL_BDAY' => 'Personal  Bday',
            'PERSONAL_ABOUT_TEX' => 'Personal  About  Tex',
            'PERSONAL_SOUL_PLUS' => 'Personal  Soul  Plus',
            'PERSONAL_SOUL_MINUS' => 'Personal  Soul  Minus',
            'ACTIVE' => 'Active',
            'LAST_LOGIN' => 'Last  Login',
            'DATE_REGISTER' => 'Date  Register',
            'ID_CONTACT' => 'Id  Contact',
            'ID_COUNTRY' => 'Id  Country',
            'ID_CITY' => 'Id  City',
            'ID_CURRENCY' => 'Id  Currency',
            'ID_LANG' => 'Id  Lang',
            'FREND_LIST' => 'Frend  List',
            'ID_STATUS' => 'Id  Status',
            'ID_ROLE' => 'Id  Role',
        ];
    }
	
	/* public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->AUTH_KEY = \Yii::$app->security->generateRandomString();
            }
            return true;
        }
        return false;
    } */
	
	public static function findIdentity($id)
    {
        return static::findOne($id);
    }
	
	public static function findIdentityByAccessToken($token, $type = null)
    {
       // return static::findOne(['AUTH_KEY' => $token]);
	   throw new NotSupportedException('findIdentityByAccessToken is not implemented.');
    }

	
	
	public function getId()
    {
        return $this->ID;
    }
		
	public function getAvatar()
	{
		return \app\modules\user\models\CUserAvatars::findOne($this->PERSONAL_AVATAR)->URL;
	}
	
	public function getAuthKey()
    {
        return $this->AUTH_KEY;
    }
	
	public function getLogin()
	{
		return $this->LOGIN;
	}
	
	public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }
	
	public function findByLogin($username)
	{
		return AuthUsers::findOne(['LOGIN'=>$username]);
	}
	
	public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->PASSWORD_HASH);
    }
	
	public function getUsername()
	{
		return 'test';
	}
}