<?php

namespace app\modules\gallery\models;

use Yii;

/**
 * This is the model class for table "core_gallery_files".
 *
 * @property integer $ID
 * @property integer $ID_USER
 * @property string $ID_ALBUMS
 * @property string $NAME
 * @property string $PIC_TAG
 * @property string $DESCRIPTION
 * @property string $SRC
 * @property string $ACTIVE
 */
class CGalleryFiles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'core_gallery_files';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_USER', 'ID_ALBUMS', 'NAME', 'PIC_TAG', 'DESCRIPTION', 'SRC'], 'required'],
            [['ID_USER'], 'integer'],
            [['DESCRIPTION'], 'string'],
            [['ID_ALBUMS'], 'string', 'max' => 500],
            [['NAME'], 'string', 'max' => 200],
            [['PIC_TAG'], 'string', 'max' => 300],
            [['SRC'], 'string', 'max' => 250],
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
            'ID_USER' => 'Id  User',
            'ID_ALBUMS' => 'Id  Albums',
            'NAME' => 'Name',
            'PIC_TAG' => 'Pic  Tag',
            'DESCRIPTION' => 'Description',
            'SRC' => 'Src',
            'ACTIVE' => 'Active',
        ];
    }
}
