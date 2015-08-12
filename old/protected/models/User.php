<?php

/**
 * This is the model class for table "core_users".
 *
 * The followings are the available columns in table 'core_users':
 * @property string $ID
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
class User extends CActiveRecord
{
	const FLAG_REGISTER = 'registration';
	const FLAG_SETTINGS = 'settings';

	
	public $type_profile;
	public $verifyCode;
	public $PASSWORD_REPEAT;
	
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'core_users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{ 
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
		//	array('LOGIN, PERSONAL_NAME, PERSONAL_LASTNAME, PERSONAL_COMPANY, PERSONAL_STATUS, PERSONAL_BDAY, PERSONAL_ABOUT_TEX, ID_CONTACT, ID_COUNTRY, ID_CITY, ID_CURRENCY, ID_LANG, FREND_LIST, ID_STATUS, ID_ROLE',  'filter'=>array($obj=new CHtmlPurifier(),'purify')),
		
			array('PERSONAL_NAME, PERSONAL_LASTNAME, PASSWORD, EMAIL, ID_COUNTRY, ID_CITY, ID_CURRENCY, ID_LANG, type_profile', 'required', 'on'=>self::FLAG_REGISTER),
			
			array('PASSWORD_REPEAT', 'compare', 'compareAttribute'=>'PASSWORD', 'message'=>"Passwords don't match", 'on'=>self::FLAG_REGISTER),
			
			array('PERSONAL_NAME, PERSONAL_LASTNAME, ID_COUNTRY, ID_CITY,', 'required', 'on'=>self::FLAG_SETTINGS),
			
			//array('PASSWORD', 'compare', 'compareAttribute'=>'PASSWORD_REPEAT', 'on'=>self::SCENARIO_REGISTER),
			//array('ID_LANG, ID_CURRENCY, ID_COUNTRY, ID_CITY', 'numerical', 'min'=>1),
			array('EMAIL', 'unique'),
			array('EMAIL', 'email'/* , 'on'=>self::FLAG_REGISTER */),
			array('EMAIL', 'length', 'min'=>6, 'max'=>50),
			array('EMAIL', 'filter', 'filter'=>'mb_strtolower'),
			 
		//	array('PASSWORD, EMAIL', 'required', 'on' => 'login'),
			//array('ID, LOGIN, PASSWORD, U_CSUMM, EMAIL, LAST_LOGIN, DATE_REGISTER, ID_COUNTRY, ID_CITY, ID_PROFILE_FLANCE, ID_PROFILE_CUSTOMER, ID_CURRENCY, ID_LANG, FREND_LIST, ID_STATUS, ID_ROLE', 'required'),
			//array('ID_COUNTRY, ID_CITY, ID_PROFILE_FLANCE, ID_PROFILE_CUSTOMER, ID_CURRENCY, ID_LANG, ID_STATUS, ID_ROLE', 'numerical', 'integerOnly'=>true),
			array('PERSONAL_AVATAR, ID_CONTACT, ID_COUNTRY, ID_CITY, ID_PROFILE_FLANCE, ID_PROFILE_CUSTOMER, ID_PROFILE_ACTIVE, ID_CURRENCY, ID_LANG, ID_STATUS, ID_ROLE', 'numerical', 'integerOnly'=>true),
			
			array('LOGIN, PASSWORD, EMAIL', 'length', 'max'=>50),
			array('U_CSUMM', 'length', 'max'=>20),
			array('ACTIVE', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID, LOGIN, PASSWORD, EMAIL, PERSONAL_AVATAR, PERSONAL_NAME, PERSONAL_LASTNAME, PERSONAL_COMPANY, PERSONAL_STATUS, PERSONAL_BDAY, PERSONAL_ABOUT_TEX, ACTIVE, LAST_LOGIN, DATE_REGISTER, ID_CONTACT, ID_COUNTRY, ID_CITY, ID_PROFILE_FLANCE, ID_PROFILE_CUSTOMER, ID_PROFILE_ACTIVE, ID_CURRENCY, ID_LANG, FREND_LIST, ID_STATUS, ID_ROLE', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'LOGIN' => 'Login',
			'PASSWORD' => 'Password',
			'U_CSUMM' => 'U Csumm',
			'EMAIL' => 'Email',
			'PERSONAL_AVATAR' => 'Personal Avatar',
			'PERSONAL_NAME' => 'Personal Name',
			'PERSONAL_LASTNAME' => 'Personal Lastname',
			'PERSONAL_COMPANY' => 'Personal Company',
			'PERSONAL_STATUS' => 'Personal Status',
			'PERSONAL_BDAY' => 'Personal Bday',
			'PERSONAL_ABOUT_TEX' => 'Personal About Tex',
			'ACTIVE' => 'Active',
			'LAST_LOGIN' => 'Last Login',
			'DATE_REGISTER' => 'Date Register',
			'ID_CONTACT' => 'Id Contact',
			'ID_COUNTRY' => 'Id Country',
			'ID_CITY' => 'Id City',
			'ID_PROFILE_FLANCE' => 'Id Profile Flance',
			'ID_PROFILE_CUSTOMER' => 'Id Profile Customer',
			'ID_PROFILE_ACTIVE' => 'Id Profile Active',
			'ID_CURRENCY' => 'Id Currency',
			'ID_LANG' => 'Id Lang',
			'FREND_LIST' => 'Frend List',
			'ID_STATUS' => 'Id Status',
			'ID_ROLE' => 'Id Role',
			'PERSONAL_SOUL_PLUS' => 'Плюсы',
			'PERSONAL_SOUL_MINUS' => 'Минусы',
			'type_profile' => 'Тип профиля',
		);
	}


	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('ID',$this->ID,true);
		$criteria->compare('LOGIN',$this->LOGIN,true);
		$criteria->compare('PASSWORD',$this->PASSWORD,true);
		$criteria->compare('U_CSUMM',$this->U_CSUMM,true);
		$criteria->compare('EMAIL',$this->EMAIL,true);
		$criteria->compare('PERSONAL_AVATAR',$this->PERSONAL_AVATAR);
		$criteria->compare('PERSONAL_NAME',$this->PERSONAL_NAME,true);
		$criteria->compare('PERSONAL_LASTNAME',$this->PERSONAL_LASTNAME,true);
		$criteria->compare('PERSONAL_COMPANY',$this->PERSONAL_COMPANY,true);
		$criteria->compare('PERSONAL_STATUS',$this->PERSONAL_STATUS,true);
		$criteria->compare('PERSONAL_BDAY',$this->PERSONAL_BDAY,true);
		$criteria->compare('PERSONAL_ABOUT_TEX',$this->PERSONAL_ABOUT_TEX,true);
		$criteria->compare('ACTIVE',$this->ACTIVE,true);
		$criteria->compare('LAST_LOGIN',$this->LAST_LOGIN,true);
		$criteria->compare('DATE_REGISTER',$this->DATE_REGISTER,true);
		$criteria->compare('ID_CONTACT',$this->ID_CONTACT);
		$criteria->compare('ID_COUNTRY',$this->ID_COUNTRY);
		$criteria->compare('ID_CITY',$this->ID_CITY);
		$criteria->compare('ID_PROFILE_FLANCE',$this->ID_PROFILE_FLANCE);
		$criteria->compare('ID_PROFILE_CUSTOMER',$this->ID_PROFILE_CUSTOMER);
		$criteria->compare('ID_PROFILE_ACTIVE',$this->ID_PROFILE_ACTIVE);
		$criteria->compare('ID_CURRENCY',$this->ID_CURRENCY);
		$criteria->compare('ID_LANG',$this->ID_LANG);
		$criteria->compare('FREND_LIST',$this->FREND_LIST,true);
		$criteria->compare('ID_STATUS',$this->ID_STATUS);
		$criteria->compare('ID_ROLE',$this->ID_ROLE);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	
	protected function beforeSave()
    {
        if(parent::beforeSave())
        {
			foreach($this->attributes as $key => $attr)
				$this->$key = $this->purify($attr);
			return true;
        }
        else
            return false;
    }
 
    protected function purify($text)
    {
        $p = new CHtmlPurifier();
       /*  $p->options = array(
            'HTML.SafeObject'=>true,
            'Output.FlashCompat'=>true,
        ); */
        return $p->purify($text);
    }
}