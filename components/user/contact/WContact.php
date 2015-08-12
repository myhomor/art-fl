<?
namespace app\components\user\contact;

use Yii;
use yii\base\Widget;
//use yii\helpers\Html;

class WContact extends Widget
{
	public $contact_id;
	public $contact;
	public $name_temp;
	public $user_id;
	
	protected function getContact()
	{
		return \app\modules\user\models\CUsersContact::findOne($this->contact_id);
	}
	public function getLabel()
	{
		return [
			'PERSONAL_PHONE' => 'Телефон',
			'PERSONAL_SITE' => 'Сайт',
			'PERSONAL_SKYPE' => 'Скайп',
			'PERSONAL_ICQ' => 'Аська',
			'PERSONAL_VK' => 'ВК',
			'PERSONAL_FB' => 'Фейсбук',
			'PERSONAL_MAIL' => 'Почта'
		];
	}
	
	
	public function init()
	{
		parent::init();
		if($this->contact_id)
			$this->contact = $this->getContact();
	}
	
	public function items()
	{
		$arr= array('ID','USER_ID');
		foreach($arr as $key)
			unset($this->contact->$key);
		return $this->contact; 
	}
	
	public function run()
	{
		return $this->render( 
					($this->name_temp ? $this->name_temp : 'index'),
					[
					'contact' => $this->contact,
					'items' => $this->items(),
					'label_name' => $this->getLabel(),
					'user_id' => $this->user_id
					]
				);
	}
}