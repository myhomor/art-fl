<?
namespace app\components\user\rating;

use Yii;
use app\modules\user\models\CUser;

class WRate extends \yii\base\Widget
{
	public $template;
	public $user;
	
	public function init()
	{
		parent::init();
		if(!$this->template)
			$this->template = 'default';
	}
	
	protected function getFollowers()
	{
		return false;
	}
	
	protected function getProject()
	{
		return false;
	}
	
	protected function getRating()
	{
		return $this->user->PERSONAL_SOUL;
	}
	
	public function run()
	{
		if($this->user)
			return $this->render( 
						$this->template, 
						[
							'follower' => $this->getFollowers(),
							'project' => $this->getProject(),
							'rating' => $this->getRating()
						]
					);
		else
			return false;
	}
}