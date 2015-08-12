<?
class AppUser extends Controller
{
	public static function checkLogin($login=false)
	{	
		if($login)
		{
			if(User::model()->findAll("LOGIN = :login", array(":login" => $login)))
				return true;
			else
				return false;
		}
		else
			return false;
	}
	
	public function GetByID($id=false)
	{
		if(!$id)
			return false;
		else
		{
			if($user = User::model()->findByPk($id))
				return $user;
			else 
				return false;
		}
	}
	
	public function GetByLogin($login=false)
	{
		if(!$login)
			return false;
		else
		{
			if($user = User::model()->findAll("LOGIN = :login", array(":login" => $login)))
				return $user[0];
			else 
				return false;
		}
	}
	
	/* public static function checkEmail($email=false)
	{
		if(!$email)
			return false;
		else
		{
			if(User::model()->findAll("EMAIL = :email", array(":email" => $email)))
				return true;
			else
				return false;
		}
	} */
	
	public static function generateProfile()
	{
		return App::includeModule(
				array(
					'module' => 'profile',
					'action' => 'generateProfile')
				);
	}
}