<?php

namespace app\modules\user\models;

use Yii;
use yii\helpers\HtmlPurifier;
/**
 * This is the model class for table "core_users_review".
 *
 * @property integer $ID
 * @property string $NAME
 * @property string $DETAIL_TEXT
 * @property string $ID_STATUS_REVIEW
 * @property integer $ID_USER_CREATE
 * @property integer $ID_USER_CHANGE
 * @property string $ACTIVE
 * @property string $DATE_CREATE
 * @property string $DATA_LAST_CHANGE
 */
class CUsersReview extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'core_users_review';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
          //  [['DETAIL_TEXT', 'STATUS_REVIEW', 'ID_USER_CREATE', 'ID_USER_CHANGE', 'ACTIVE', 'DATE_CREATE', 'DATE_LAST_CHANGE', 'ID_USER'], 'required'],
			//[['DETAIL_TEXT', 'STATUS_REVIEW', 'ID_USER_CREATE', 'ACTIVE', 'DATE_CREATE', 'ID_USER'], 'required'],
            [['DETAIL_TEXT'], 'string'],
            [['ID_USER_CREATE', 'ID_USER_CHANGE','ID_USER'], 'integer'],
			[['DATE_CREATE', 'DATE_LAST_CHANGE'], 'safe'],
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
			'ID_USER' => 'ID_USER',
            //'NAME' => 'Name',
            'DETAIL_TEXT' => 'Detail  Text',
            'STATUS_REVIEW' => 'Id  Status  Review',
            'ID_USER_CREATE' => 'Id  User  Create',
            'ID_USER_CHANGE' => 'Id  User  Change',
            'ACTIVE' => 'Active',
            'DATE_CREATE' => 'Date  Create',
            'DATE_LAST_CHANGE' => 'Data  Last  Change',
        ];
    }
	
	/*public function beforeSave()
    {
        if(parent::beforeSave())
        {	
			
			$this->NAME = HtmlPurifier::process($this->NAME);
			$this->DETAIL_TEXT = HtmlPurifier::process($this->DETAIL_TEXT);
			return true;
        }
        else
            return false;
    } */
}
