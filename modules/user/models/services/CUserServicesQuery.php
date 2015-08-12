<?php

namespace app\modules\user\models\services;

/**
 * This is the ActiveQuery class for [[CUserServices]].
 *
 * @see CUserServices
 */
class CUserServicesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return CUserServices[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return CUserServices|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
	public function byID($id = null)
	{
		return parent::where('ID = :id', [':id' => $id])->one();
	}
	
	public function byUserID($id = null , $active = false)
	{
		if(!$active)
			return parent::where('ID_USER = :id', [':id' => $id]);
		else	
			return parent::where('ID_USER = :id AND ACTIVE="Y"', [':id' => $id]);
	}

}