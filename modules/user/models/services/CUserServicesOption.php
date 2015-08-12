<?php

namespace app\modules\user\models\services;

use Yii;

/**
 * This is the model class for table "core_user_services_option".
 *
 * @property integer $ID
 * @property integer $ID_SERVICE
 * @property string $NAME
 * @property string $DETAIL_TEXT
 * @property integer $PRICE
 * @property integer $ID_CURRENCY
 * @property string $ACTIVE
 */
class CUserServicesOption extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'core_users_services_option';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['ID_SERVICE', 'NAME', 'DETAIL_TEXT', 'PRICE', 'ID_CURRENCY', 'ACTIVE'], 'required'],
            [['ID_SERVICE', 'NAME', 'PRICE', 'ID_CURRENCY', 'ACTIVE'], 'required'],
            [['ID_SERVICE', 'PRICE', 'ID_CURRENCY'], 'integer'],
            [['DETAIL_TEXT'], 'string'],
            [['NAME'], 'string', 'max' => 200],
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
            'ID_SERVICE' => 'Id  Service',
            'NAME' => 'Name',
            'DETAIL_TEXT' => 'Detail  Text',
            'PRICE' => 'Price',
            'ID_CURRENCY' => 'Id  Currency',
            'ACTIVE' => 'Active',
        ];
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
