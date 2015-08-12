<?php

namespace app\modules\user\models;

/**
 * This is the ActiveQuery class for [[CUsersContact]].
 *
 * @see CUsersContact
 */
class CUsersContactQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return CUsersContact[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return CUsersContact|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
	 /**
     * @inheritdoc
     * @return CUsersContact|array|false
     */
	
	public function byUserID($id = null)
	{
		if(is_null($id)) return false;
		else
			return parent::where('USER_ID = :id', [':id' => $id])->one();
	}
}