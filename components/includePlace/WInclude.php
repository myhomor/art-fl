<?
namespace app\components\includePlace;

use Yii;
use yii\base\Widget;

class WInclude extends Widget
{
	public $file;
	public $user;
	
	public function init()
	{
		parent::init();
	}
	
	public function run()
	{
		if($this->file)
		
			return $this->render( 
						$this->file, 
						[
							'user' => $this->user,
							'default_avatar' => Yii::$app->params['defaultAvatar']
						]
					);
		else
			return false;
	}
}