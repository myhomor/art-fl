<?php

/**
 * This is the model class for table "core_tags".
 *
 * The followings are the available columns in table 'core_tags':
 * @property integer $ID
 * @property string $NAME
 * @property string $ACTIVE
 * @property integer $FLANCE
 * @property integer $CUSTOMER
 * @property integer $PROJECT
 */
class Tags extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'core_tags';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NAME, ACTIVE, FLANCE, CUSTOMER, PROJECT', 'required'),
			array('FLANCE, CUSTOMER, PROJECT', 'numerical', 'integerOnly'=>true),
			array('NAME', 'length', 'max'=>256),
			array('ACTIVE', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID, NAME, ACTIVE, FLANCE, CUSTOMER, PROJECT', 'safe', 'on'=>'search'),
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
			'NAME' => 'Name',
			'ACTIVE' => 'Active',
			'FLANCE' => 'Flance',
			'CUSTOMER' => 'Customer',
			'PROJECT' => 'Project',
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
		$criteria->compare('NAME',$this->NAME,true);
		$criteria->compare('ACTIVE',$this->ACTIVE,true);
		$criteria->compare('FLANCE',$this->FLANCE);
		$criteria->compare('CUSTOMER',$this->CUSTOMER);
		$criteria->compare('PROJECT',$this->PROJECT);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tags the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
