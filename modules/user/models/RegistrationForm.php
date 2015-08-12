<?
namespace app\modules\user\models;

use Yii;
use yii\base\Model;
use app\modules\user\models\CUser;
use yii\helpers\Url;

class RegistrationForm extends Model
{
	
	public $username;
	public $lastname;
	public $email;
	public $password;
	//public $password_repeat;
	public $id_city;
	public $id_country;
	
	
	public function rules() 
    {
        return [
            // username and password are both required
			[['username','password', 'email',], 'required'],
			[['username','lastname'], 'string'],
			['email', 'email'],	
			['email', 'validateEmail'],	
        ];
    }
	
	/**
	 * Declares attribute labels.
	*/
	public function attributeLabels()
	{
		return array(
			'username' => 'Имя',
			'lastname' => 'Фамилия',
			'email'=>'Емейл',
			'password'=>'Пароль',
			//'password_repeat'=>'Повторите пароль',
			'id_city'=>'Город',
			'id_country'=>'Страна',
		);
	}
	
	public function setAttributes($attributes=null)
	{
		foreach($attributes as $key=>$val)
			$this->$key = $val;
	}
	
	public function validateEmail()
	{
		if(!$this->hasErrors())
		{
			if(CUser::find()->byEmail($this->email))
				$this->addError('email', 'Такой адрес почты уже зарегистрирован');
		}
	}
	
	public function sendMail($code)
	{
		$user_mess = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
		<html>
		<head>
		  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		  <title>Cпасибо за регистрацию!</title>
		</head>
		<body>
		<table style="width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 11px;border: 1px solid #DAD8D8;padding: 15px;">
			<tr>
				<td style="width: 200px;"><img src="http://romevacation.ru/img/logo.png"/></td>
				<td valign="bottom" style="text-align: center;font-size: 31px; color: #F26F66;">Римcкие Каникулы</td>
			</tr>
			<tr><td colspan="2" style="height:15px"></td></tr>
			<tr><td colspan="2" style="font-size: 13px;color: #444;">Благодарим Вас за регистрацию! Осталось лишь подтвердить регистрацию, для этого перейдите по адресу '. Url::toRoute(['/activekey/', 'type' => 'registration', 'code' => $code]) .'</td></tr>
		</table>
		</body>
		</html>'; 
		
		Yii::$app->mailer->compose()
			->setTo($this->email)
			->setFrom([\Yii::$app->params['supportEmail'] => 'art-up.me'])
			->setSubject('Cпасибо за регистрацию!')
			->setHtmlBody($user_mess)
			->send();
	}
	
	
	public function registeration()
	{
		$user = new CUser();
		
		$login = explode('@', $this->email);	
		
		$user->setDefaultValues();
		
		$user->PERSONAL_NAME = $this->username;
		$user->PERSONAL_LASTNAME = $this->lastname;
		$user->EMAIL = $this->email;
		$user->LOGIN = $login[0];
		$user->PASSWORD_HASH = \Yii::$app->security->generatePasswordHash($this->password);
		
		if($user->save())
		{
			$this->sendMail($user->EMAIL_CONFIRM_TOKEN);
			return true;
		}
		else
			return false;
	} 
}
?>