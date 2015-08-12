<?php
namespace app\modules\user\models;

/**
 * This is the ActiveQuery class for [[CUser]].
 *
 * @see CUser
 */
class CUsersQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return CUser[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return CUser|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
	
	
	public function byID($id = null)
	{
		return parent::where('ID = :id', array(':id'=>$id))->one(); 
	}
	
	public function byLogin($login=null)
	{
		return parent::where('LOGIN = :login', array(':login'=>$login))->one(); 
	}
	public function byEmail($email=null)
	{
		return parent::where('EMAIL = :email', array(':email'=>$email))->one(); 
	}
	
	public function byEmailToken($code=null)
	{
		return parent::where('EMAIL_CONFIRM_TOKEN = :code',array(':code'=>$code))->one();
	}
	public function getLoginByID($id=null)
	{
		$user = parent::where('ID = :id', ['id'=>$id])->one();
		return ($user ? $user->LOGIN : false);
	}
}