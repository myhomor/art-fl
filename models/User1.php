<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

//https://github.com/dektrium/yii2-user
/**
 * This is the model class for table "tbl_user".
 *
 * @property string $userid
 * @property string $username
 * @property string $password
 */
class User extends ActiveRecord implements IdentityInterface
{
	public $username = 'test';
	const STATUS_BLOCKED = 'B';
    const STATUS_ACTIVE = 'Y';
    const STATUS_WAIT = 'N';
	
	public function rules()
    { 
        return [
            [['LOGIN', 'PASSWORD', 'U_CSUMM', 'EMAIL', 'PERSONAL_AVATAR', 'PERSONAL_NAME', 'PERSONAL_LASTNAME', 'PERSONAL_COMPANY', 'PERSONAL_STATUS', 'PERSONAL_BDAY', 'PERSONAL_ABOUT_TEX', 'PERSONAL_SOUL_PLUS', 'PERSONAL_SOUL_MINUS', 'LAST_LOGIN', 'DATE_REGISTER', 'ID_CONTACT', 'ID_COUNTRY', 'ID_CITY', 'ID_PROFILE_FLANCE', 'ID_PROFILE_CUSTOMER', 'ID_PROFILE_ACTIVE', 'ID_CURRENCY', 'ID_LANG', 'FREND_LIST', 'ID_STATUS', 'ID_ROLE'], 'required'],
            [['PERSONAL_AVATAR', 'PERSONAL_SOUL_PLUS', 'PERSONAL_SOUL_MINUS', 'ID_CONTACT', 'ID_COUNTRY', 'ID_CITY', 'ID_PROFILE_FLANCE', 'ID_PROFILE_CUSTOMER', 'ID_PROFILE_ACTIVE', 'ID_CURRENCY', 'ID_LANG', 'ID_STATUS', 'ID_ROLE'], 'integer'],
            [['PERSONAL_BDAY', 'LAST_LOGIN', 'DATE_REGISTER'], 'safe'],
            [['PERSONAL_ABOUT_TEX', 'FREND_LIST'], 'string'],
            [['LOGIN', 'PASSWORD', 'EMAIL'], 'string', 'max' => 50],
            [['U_CSUMM'], 'string', 'max' => 20],
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
            'U_CSUMM' => 'U  Csumm',
            'EMAIL' => 'Email',
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
            'ID_PROFILE_FLANCE' => 'Id  Profile  Flance',
            'ID_PROFILE_CUSTOMER' => 'Id  Profile  Customer',
            'ID_PROFILE_ACTIVE' => 'Id  Profile  Active',
            'ID_CURRENCY' => 'Id  Currency',
            'ID_LANG' => 'Id  Lang',
            'FREND_LIST' => 'Frend  List',
            'ID_STATUS' => 'Id  Status',
            'ID_ROLE' => 'Id  Role',
			'created_at' => 'Создан',
            'updated_at' => 'Обновлён',
        ];
    }


	/**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'core_users';
    }  
	
	/**
    * @inheritdoc
    */
    public static function findIdentity($id)
    {
        return static::findOne(['ID' => $id]);
    }
 
    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('findIdentityByAccessToken is not implemented.');
    }
 
    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }
	
	public $login;
	/* public function setLogin()
	{
		return $this->login;
	} */
	
    /**
     * @inheritdoc
     */
  /*   public function getAuthKey()
    {
        return $this->auth_key;
    } */
 
    /**
     * @inheritdoc
     */
  /*   public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    } */

	 /**
     * Generates "remember me" authentication key
     */
    /* public function generateAuthKey()
    {
        $this->AUTH_KEY = Yii::$app->security->generateRandomString();
    } */
	
	
	
	
}
