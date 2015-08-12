<?php

namespace app\modules\user\models;

use Yii;

/**
 * This is the model class for table "core_user_avatars".
 *
 * @property integer $ID
 * @property string $URL
 * @property string $NAME
 */
class CUserAvatars extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'core_users_avatars';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['URL', 'NAME', 'ID_USER_CREATE'], 'required'],
            [['NAME'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'URL' => 'Url',
            'NAME' => 'Name',
        ];
    }

    /**
     * @inheritdoc
     * @return CUserAvatarsQuery the active query used by this AR class.
     */
    /* public static function find()
    {
        return new CUserAvatarsQuery(get_called_class());
    } */
}
