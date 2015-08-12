<?php

/**
 * This is the model class for table "core_profile".
 *
 * The followings are the available columns in table 'core_profile':
 * @property integer $ID
 * @property integer $ID_REVIEW
 * @property integer $ID_USER_PORTFOLIO
 * @property integer $ID_USER_PROJECTS_ARCHIVE
 * @property integer $ID_USER_PROJECTS_ACTIVE
 * @property string $ID_USER_TAGS
 * @property integer $PERSONAL_SOUL_MINUS
 * @property integer $PERSONAL_SOUL_PLUS
 * @property integer $PERSONAL_FINAL_PROJECT
 */
class Profile extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	/* const FLAG_REGISTER = 'registration';
	public $type_profile;  */
	const FLAG_REGISTER = 'registration';
	public function tableName()
	{
		return 'core_profile';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return 
		array(
			//array('ID_REVIEW, ID_USER_PORTFOLIO, ID_USER_PROJECTS_ARCHIVE, ID_USER_PROJECTS_ACTIVE, ID_USER_TAGS, PERSONAL_SOUL_MINUS, PERSONAL_SOUL_PLUS, PERSONAL_FINAL_PROJECT', 'required'),
			
			//array('PERSONAL_AVATAR', 'file', 'types'=>'jpg,jpeg,gif,png', 'allowEmpty'=>true, 'on' => self::FLAG_REGISTER),
			array('ID_REVIEW, ID_USER_PORTFOLIO, ID_USER_PROJECTS_ARCHIVE, ID_USER_PROJECTS_ACTIVE, PERSONAL_SOUL_MINUS, PERSONAL_SOUL_PLUS, PERSONAL_FINAL_PROJECT', 'numerical', 'integerOnly'=>true),
			array('ID_USER_TAGS', 'length', 'max'=>256),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID, ID_REVIEW, ID_USER_PORTFOLIO, ID_USER_PROJECTS_ARCHIVE, ID_USER_PROJECTS_ACTIVE, ID_USER_TAGS, PERSONAL_SOUL_MINUS, PERSONAL_SOUL_PLUS, PERSONAL_FINAL_PROJECT', 'safe', 'on'=>'search'),
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
			'ID_REVIEW' => 'Id Review',
			'ID_USER_PORTFOLIO' => 'Id User Portfolio',
			'ID_USER_PROJECTS_ARCHIVE' => 'Id User Projects Archive',
			'ID_USER_PROJECTS_ACTIVE' => 'Id User Projects Active',
			'ID_USER_TAGS' => 'Id User Tags',
			'PERSONAL_SOUL_MINUS' => 'Personal Soul Minus',
			'PERSONAL_SOUL_PLUS' => 'Personal Soul Plus',
			'PERSONAL_FINAL_PROJECT' => 'Personal Final Project',
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
		$criteria->compare('ID_REVIEW',$this->ID_REVIEW);
		$criteria->compare('ID_USER_PORTFOLIO',$this->ID_USER_PORTFOLIO);
		$criteria->compare('ID_USER_PROJECTS_ARCHIVE',$this->ID_USER_PROJECTS_ARCHIVE);
		$criteria->compare('ID_USER_PROJECTS_ACTIVE',$this->ID_USER_PROJECTS_ACTIVE);
		$criteria->compare('ID_USER_TAGS',$this->ID_USER_TAGS,true);
		$criteria->compare('PERSONAL_SOUL_MINUS',$this->PERSONAL_SOUL_MINUS);
		$criteria->compare('PERSONAL_SOUL_PLUS',$this->PERSONAL_SOUL_PLUS);
		$criteria->compare('PERSONAL_FINAL_PROJECT',$this->PERSONAL_FINAL_PROJECT);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Profile the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
