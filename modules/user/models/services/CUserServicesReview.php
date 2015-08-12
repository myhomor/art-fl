<?php

namespace app\modules\user\models\services;

use Yii;

/**
 * This is the model class for table "core_user_services_review".
 *
 * @property integer $ID
 * @property integer $ID_SERVICE
 * @property string $STATUS_REVIEW
 * @property string $ACTIVE
 * @property string $DATE_CREATE
 * @property string $DATE_LAST_CHANGE
 * @property integer $ID_USER_CREATE
 * @property integer $ID_USER_CHANGE
 * @property string $DETAIL_TEXT
 */
class CUserServicesReview extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'core_users_services_review';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_SERVICE', 'STATUS_REVIEW', 'ACTIVE', 'DATE_CREATE', 'ID_USER_CREATE'], 'required'],
            [['ID_SERVICE', 'ID_USER_CREATE', 'ID_USER_CHANGE'], 'integer'],
            [['DATE_CREATE', 'DATE_LAST_CHANGE'], 'safe'],
            [['DETAIL_TEXT'], 'string'],
            [['STATUS_REVIEW', 'ACTIVE'], 'string', 'max' => 1]
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
            'STATUS_REVIEW' => 'Status  Review',
            'ACTIVE' => 'Active',
            'DATE_CREATE' => 'Date  Create',
            'DATE_LAST_CHANGE' => 'Date  Last  Change',
            'ID_USER_CREATE' => 'Id  User  Create',
            'ID_USER_CHANGE' => 'Id  User  Change',
            'DETAIL_TEXT' => 'Detail  Text',
        ];
    }
	
	public function beforeSave()
    {
        if(parent::beforeSave())
        {	
			$this->DETAIL_TEXT = \yii\helpers\HtmlPurifier::process($this->DETAIL_TEXT);
			return true;
        }
        else
            return false;
    }
}
