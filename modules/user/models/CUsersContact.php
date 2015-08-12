<?php

namespace app\modules\user\models;

use Yii;
use yii\helpers\HtmlPurifier;

/**
 * This is the model class for table "core_users_contact".
 *
 * @property integer $ID
 * @property integer $USER_ID
 * @property string $PERSONAL_PHONE
 * @property string $PERSONAL_SITE
 * @property string $PERSONAL_SKYPE
 * @property integer $PERSONAL_ICQ
 * @property string $PERSONAL_VK
 * @property string $PERSONAL_FB
 * @property string $PERSONAL_MAIL
 */
class CUsersContact extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'core_users_contact';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
           // [['USER_ID', 'PERSONAL_PHONE', 'PERSONAL_SITE', 'PERSONAL_SKYPE', 'PERSONAL_ICQ', 'PERSONAL_VK', 'PERSONAL_FB', 'PERSONAL_MAIL'], 'required'],
            [['USER_ID'], 'required'],
            [['USER_ID', 'PERSONAL_ICQ'], 'integer'],
            [['PERSONAL_SITE'], 'string'],
            [['PERSONAL_PHONE', 'PERSONAL_SKYPE', 'PERSONAL_VK', 'PERSONAL_FB', 'PERSONAL_MAIL'], 'string', 'max' => 256]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'USER_ID' => 'User  ID',
            'PERSONAL_PHONE' => 'Personal  Phone',
            'PERSONAL_SITE' => 'Personal  Site',
            'PERSONAL_SKYPE' => 'Personal  Skype',
            'PERSONAL_ICQ' => 'Personal  Icq',
            'PERSONAL_VK' => 'Personal  Vk',
            'PERSONAL_FB' => 'Personal  Fb',
            'PERSONAL_MAIL' => 'Personal  Mail',
        ];
    }

    /**
     * @inheritdoc
     * @return CUsersContactQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CUsersContactQuery(get_called_class());
    }
	
	public function beforeSave()
    {
        if(parent::beforeSave())
        {	
			foreach($this->attributes as $key => $attr)
				$this->$key = HtmlPurifier::process($attr);
			return true;
        }
        else
            return false;
    }
}
