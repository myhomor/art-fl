<?
namespace app\modules\user\models\settings;

use Yii;
use yii\web\UploadedFile;
use app\modules\user\models\CUser;


class UserForm extends \yii\base\Model
{	
	public $avatar;
	public $avatar_id;
	
	public $login;
	public $email;
	public $username;
	public $lastname;
	public $company;
	public $bday;
	public $about_text;
	
	public $_user;
	
	public function rules()
    {
        return [
            //[['login','username', 'lastname', 'email'], 'required'],
			['email', 'email'],
            ['email', 'checkEmail'],
			[['login','email'], 'filter', 'filter' => 'trim'],
			['login', 'checkLogin'],
			
            [['avatar'], 'file' /* 'extensions' => 'jpg, png', 'mimeTypes' => 'image/jpeg, image/png' */],
		];
    }
	
	public function attributeLabels()
	{
		return array(
			'username' => 'Имя',
			'lastname' => 'Фамилия',
			'email'=>'Емейл',
			'login' => 'Логин',
			'company' => 'Компания',
			'bday' => 'День рождения',
			'about_text' => 'О себе',
			'avatar' => 'Аватар'
		);
	}
	
	public function attributeModel()
	{
		return array(
			'username' => 'PERSONAL_NAME',
			'lastname' => 'PERSONAL_LASTNAME',
			'email'=>'EMAIL',
			'login' => 'LOGIN',
			'company' => 'PERSONAL_COMPANY',
			'bday' => 'PERSONAL_BDAY',
			'about_text' => 'PERSONAL_ABOUT_TEX',
			'avatar_id' => 'PERSONAL_AVATAR',
		);
	}
	
	public function isAction()
	{
		$actions = array('settings');
		return in_array($this->login, $actions);
	}
	
	public function checkEmail()
	{
		if(CUser::find()->byEmail($this->email) AND $this->email != $this->_user->EMAIL)
			$this->addError('email', 'Такой адрес почты уже зарегистрирован');
	}
	
	public function checkLogin()
	{
		if(CUser::find()->byLogin($this->login) OR $this->isAction())
			if($this->login != $this->_user->LOGIN)
				$this->addError('login', 'Логин уже занят');
	}
	
	public function setAttributes($attributes=false)
	{
		if(!is_array($attributes))
			return false;
		else
		{
			foreach($attributes as $key=>$val)
				$this->$key = $val;
			
			$this->attributes = $attributes;
			return true;
		}	
	}
	
	public function update()
	{
		$arAttr = $this->attributeModel();
		$avatar = $this->_user->PERSONAL_AVATAR;
		
		$this->avatar = UploadedFile::getInstance($this, 'avatar');
		
		if ($this->avatar && $this->validate()) 
		{                
			$file_path = ('upload/user/ava/' . md5($this->avatar->baseName) . '.' . $this->avatar->extension);
			$this->avatar->saveAs($file_path);
				
			$ava_model = new \app\modules\user\models\CUserAvatars();
			$ava_model->NAME = $this->avatar->baseName;
			$ava_model->ID_USER_CREATE = $this->_user->ID;
			$ava_model->URL = '/'.$file_path;
			$ava_model->DATA_CREATE = date("Y-m-d H:i:s");
			$ava_model->save();	
			$this->avatar_id = $ava_model->ID;
		}
		
		$this->avatar = '';
		if($this->validate())
		{	
			foreach($arAttr as $key=>$val)
				$this->_user->$val = $this->$key;
			
			if(!$this->_user->PERSONAL_AVATAR) 
				$this->_user->PERSONAL_AVATAR = $avatar;
				
			$this->_user->update();
		}
		return $file_path;
	}
}
?>