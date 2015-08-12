<?
namespace app\modules\user\models\settings;

use Yii;

class ContactForm extends yii\base\Model
{
	public $phone;
	public $site;
	public $skype;
	public $icq;
	public $vk;
	public $fb;
	public $email;
	
	//model CUsersContact
	public $_contact;
	
	public function rules()
    {
        return [
           // [['login','username', 'lastname', 'email'], 'required'],
            [['site','skype', 'vk', 'fb'], 'string'],
			['email', 'email'],
			[['phone', 'icq'], 'integer'],	
        ];
    }
	
	public function attributeLabels()
	{
		return array(
			'phone' => 'Телефон',
			'site' => 'Сайт',
			'skype'=>'Скайп',
			'icq' => 'ICQ',
			'vk' => 'Вконтакте',
			'fb' => 'Фейсбук',
			'email' => 'Почта',
		);
	}
	
	public function attributeModel()
	{
		return array(
			'phone' => 'PERSONAL_PHONE',
			'site' => 'PERSONAL_SITE',
			'skype'=>'PERSONAL_SKYPE',
			'icq' => 'PERSONAL_ICQ',
			'vk' => 'PERSONAL_VK',
			'fb' => 'PERSONAL_FB',
			'email' => 'PERSONAL_MAIL',
		);
	}
	
	public function getAttr()
	{
		return $this->attributes;
	}
	
	public function update()
	{
		if($this->validate() && $this->_contact)
		{
			/* задаем атрибуты модели контактов относительно атрибутов формы */
			$arAttr = $this->attributeModel();
			foreach($arAttr as $key=>$val)
				$this->_contact->$val = $this->$key;
			
			$this->_contact->USER_ID = Yii::$app->user->ID;
			$this->_contact->update();
		}
	}
}
?>