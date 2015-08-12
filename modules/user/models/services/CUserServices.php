<?php

namespace app\modules\user\models\services;

use Yii;

/**
 * This is the model class for table "core_user_services".
 *
 * @property integer $ID
 * @property integer $ID_USER
 * @property string $ACTIVE
 * @property string $TIME_TO_WORK
 * @property string $NAME
 * @property integer $PRICE
 * @property integer $ID_CURRENCY
 * @property integer $AVATAR
 * @property string $DETAIL_TEXT
 * @property string $MORE_FILE
 * @property string $DATE_CREATE
 * @property string $DATE_LAST_CHANGE
 */
class CUserServices extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'core_users_services';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
          //  [['ID_USER', 'ACTIVE', 'TIME_TO_WORK', 'NAME', 'PRICE', 'ID_CURRENCY', 'AVATAR', 'DETAIL_TEXT', 'MORE_FILE', 'DATE_CREATE', 'DATE_LAST_CHANGE'], 'required'],
            [['ID_USER', 'PRICE', 'ID_CURRENCY', 'AVATAR'], 'integer'],
            [['DETAIL_TEXT'], 'string'],
            [['DATE_CREATE', 'DATE_LAST_CHANGE'], 'string'],
            [['ACTIVE'], 'string', 'max' => 1],
            [['TIME_TO_WORK'], 'string', 'max' => 20],
            [['NAME'], 'string', 'max' => 100],
            [['MORE_FILE'], 'string', 'max' => 150]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'ID_USER' => 'Id  User',
            'ACTIVE' => 'Активность',
            'TIME_TO_WORK' => 'Время на работу',
            'NAME' => 'Название',
            'PRICE' => 'Цена',
            'ID_CURRENCY' => 'Валюта',
            'AVATAR' => 'Аватар',
            'DETAIL_TEXT' => 'Описание',
            'MORE_FILE' => 'Приклепленное фото',
            'DATE_CREATE' => 'Дата создания',
            'DATE_LAST_CHANGE' => 'Дата редактирования',
        ];
    }

    /**
     * @inheritdoc
     * @return CUserServicesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CUserServicesQuery(get_called_class());
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
}
