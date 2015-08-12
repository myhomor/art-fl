<?
namespace app\components\user\avatar;

use Yii;

class WAvatar extends \yii\base\Widget
{
	public $name_temp;
	public $img_id;
	public $image;
	
	public function init()
	{
		parent::init();
		if($this->img_id)
			$this->image = \app\modules\user\models\CUserAvatars::findOne($this->img_id);
	}
	
	public function run()
	{
		return $this->render( 
					($this->name_temp ? $this->name_temp : 'index'),
					[
					'image' => $this->image,
					'default_image' => Yii::$app->params['defaultAvatar']
					]
				); 
	}

}
?>