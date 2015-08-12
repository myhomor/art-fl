<?php

/**
 * This is the model class for table "core_users_contact".
 *
 * The followings are the available columns in table 'core_users_contact':
 * @property integer $ID
 * @property integer $USER_ID
 * @property string $PERSONAL_PHONE
 * @property string $PERSONAL_SITE
 * @property string $PERSONAL_SKYPE
 * @property integer $PERSONAL_ICQ
 * @property string $PERSONAL_VK
 * @property string $PERSONAL_FB
 */
class UserContact extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'core_users_contact';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('ID, USER_ID, PERSONAL_PHONE, PERSONAL_SITE, PERSONAL_SKYPE, PERSONAL_ICQ, PERSONAL_VK, PERSONAL_FB', 'required'),
			array('ID, USER_ID, PERSONAL_ICQ', 'numerical', 'integerOnly'=>true),
			array('PERSONAL_PHONE, PERSONAL_SKYPE, PERSONAL_VK, PERSONAL_FB', 'length', 'max'=>256),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID, USER_ID, PERSONAL_PHONE, PERSONAL_SITE, PERSONAL_SKYPE, PERSONAL_ICQ, PERSONAL_VK, PERSONAL_FB', 'safe', 'on'=>'search'),
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
			'USER_ID' => 'User',
			'PERSONAL_PHONE' => 'Personal Phone',
			'PERSONAL_SITE' => 'Personal Site',
			'PERSONAL_SKYPE' => 'Personal Skype',
			'PERSONAL_ICQ' => 'Personal Icq',
			'PERSONAL_VK' => 'Personal Vk',
			'PERSONAL_FB' => 'Personal Fb',
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

		$criteria->compare('ID',$this->ID);
		$criteria->compare('USER_ID',$this->USER_ID);
		$criteria->compare('PERSONAL_PHONE',$this->PERSONAL_PHONE,true);
		$criteria->compare('PERSONAL_SITE',$this->PERSONAL_SITE,true);
		$criteria->compare('PERSONAL_SKYPE',$this->PERSONAL_SKYPE,true);
		$criteria->compare('PERSONAL_ICQ',$this->PERSONAL_ICQ);
		$criteria->compare('PERSONAL_VK',$this->PERSONAL_VK,true);
		$criteria->compare('PERSONAL_FB',$this->PERSONAL_FB,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UserContact the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
