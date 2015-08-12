<?php

namespace app\modules\user\models;

use Yii;

/**
 * This is the model class for table "core_users".
 *
 * @property integer $ID
 * @property string $LOGIN
 * @property string $PASSWORD
 * @property string $U_CSUMM
 * @property string $EMAIL
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
class CUser extends \yii\db\ActiveRecord
{

	const STATUS_BLOCKED = 'B';
    const STATUS_ACTIVE = 'Y';
    const STATUS_WAIT = 'N';
	
	const ROLE_USER = 3;
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
    public function rules()
    {
        return [
           // [['LOGIN', 'PASSWORD', 'EMAIL', 'PERSONAL_AVATAR', 'PERSONAL_NAME', 'PERSONAL_LASTNAME', 'PERSONAL_COMPANY', 'PERSONAL_STATUS', 'PERSONAL_BDAY', 'PERSONAL_ABOUT_TEX', 'PERSONAL_SOUL_PLUS', 'PERSONAL_SOUL_MINUS', 'LAST_LOGIN', 'DATE_REGISTER', 'ID_CONTACT', 'ID_COUNTRY', 'ID_CITY', 'ID_CURRENCY', 'ID_LANG', 'FREND_LIST', 'ID_STATUS', 'ID_ROLE','ACTIVE'], 'required'],
            [['PERSONAL_AVATAR', 'PERSONAL_SOUL_PLUS', 'PERSONAL_SOUL_MINUS','PERSONAL_SOUL', 'ID_CONTACT', 'ID_COUNTRY', 'ID_CITY', 'ID_CURRENCY', 'ID_LANG', 'ID_STATUS', 'ID_ROLE'], 'integer'],
            [['PERSONAL_BDAY', 'LAST_LOGIN', 'DATE_REGISTER'], 'safe'],
            [['PERSONAL_ABOUT_TEX', 'FREND_LIST','ACTIVE'], 'string'],
            [['LOGIN', 'PASSWORD', 'EMAIL'], 'string', 'max' => 50],
           // ['PASSWORD', 'string', 'min' => 6],
            //[['U_CSUMM'], 'string', 'max' => 20],
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
			'PERSONAL_SOUL' => 'Рейтинг',
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
	
	protected function defaultValues()
	{
		return [
            'PERSONAL_AVATAR' => 14,
            'PERSONAL_BDAY' => 0,
			'PERSONAL_SOUL' => 0,
            'PERSONAL_SOUL_PLUS' => 0,
            'PERSONAL_SOUL_MINUS' => 0,
			'EMAIL_CONFIRM_TOKEN' => \Yii::$app->security->generateRandomString(),
            'ACTIVE' => self::STATUS_WAIT,
            'LAST_LOGIN' => 0,
            'DATE_REGISTER' => date("Y-m-d H:i:s"),
            'ID_CONTACT' => 0,
            'ID_COUNTRY' => 0,
            'ID_CITY' => 0,
            'ID_CURRENCY' => 1,
            'ID_LANG' => 1,
            'FREND_LIST' => 'Frend  List',
            'ID_STATUS' => 1,
            'ID_ROLE' => self::ROLE_USER,
        ];
	}
	
	public function setDefaultValues()
	{
		foreach($this->defaultValues() as $key => $val)
			$this->$key = $val;
	}
	
	
	public function beforeSave()
    {
        if(parent::beforeSave())
        {	
			foreach($this->attributes as $key => $attr)
				$this->$key = \yii\helpers\HtmlPurifier::process($attr);
			return true;
        }
        else
            return false;
    }
	
	/**
     * @inheritdoc
     * @return CUsersQuery the active query used by this AR class.
     */ 
    public static function find()
    {
        return new CUsersQuery(get_called_class());
    }
	
	
	public static function getStatusesArray()
    {
        return [
            self::STATUS_BLOCKED => 'Заблокирован',
            self::STATUS_ACTIVE => 'Активен',
            self::STATUS_WAIT => 'Ожидает подтверждения',
        ];
    }
	
	public static function getStatus()
	{
		return self::STATUS_WAIT;
	}
	
	public static function getAvatar($id=null)
	{
		return \app\modules\user\models\CUserAvatars::findOne($id)->URL;
	}
	
}
