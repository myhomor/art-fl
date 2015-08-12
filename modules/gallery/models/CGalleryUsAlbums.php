<?php

namespace app\modules\gallery\models;

use Yii;

/**
 * This is the model class for table "core_gallery_user_albums".
 *
 * @property integer $ID
 * @property integer $ID_ALLOW
 * @property integer $ID_USER
 * @property string $NAME
 * @property integer $SORT
 * @property string $ACTIVE
 */
class CGalleryUsAlbums extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'core_gallery_user_albums';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_ALLOW', 'ID_USER', 'SORT'], 'integer'],
            [['ID_USER', 'NAME'], 'required'],
            [['NAME'], 'string', 'max' => 250],
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
            'ID_ALLOW' => 'Id  Allow',
            'ID_USER' => 'Id  User',
            'NAME' => 'Name',
            'SORT' => 'Sort',
            'ACTIVE' => 'Active',
        ];
    }
}
