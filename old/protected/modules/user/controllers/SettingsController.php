<?
class SettingsController extends Controller
{
	public function actionIndex()
	{
		$this->actionUser();
	}

	public function actionUser($_action=false,$elem_id=false)
	{
		if(Yii::app()->user->isGuest)
			App::setERROR(404);
		else
		{
			$model = AppUser::GetByID(Yii::app()->user->ID);
			if(isset($_POST['User']))
			{
				if(!$_POST['User']['EMAIL'] OR empty($_POST['User']['EMAIL']))
					$_POST['User']['EMAIL'] = $model->EMAIL;	
				else
					if($_POST['User']['EMAIL'] == $model->EMAIL)
						unset($_POST['User']['EMAIL']);
					foreach($_POST['User'] as $key=>$attr)
						$model->$key = $attr;
								
					if($model->validate())
						$model->update();
			}
			$this->render(
					'index',
					array(
						'model' => $model,
						'post' => $_POST
					)
				);
		}
	}
	
	public function actionService($_action=false,$elem_id=false)
	{
		if(Yii::app()->user->isGuest)
			App::setERROR(404);
		else
		{
		
			$user = AppUser::GetByID(Yii::app()->user->ID);
			$name = 'service'.$_action;
			
			if($action = App::checkAction(__CLASS__ ,'service'. ucfirst($_action)))
			{
				$this->$action(
					array(
						'_action' => $action,
						'elem_id' => $elem_id,
						'user' => $user,
					)
				); 
			}
			else
				$this->render('service',array('arResult' => array('tt' => 'service'.$_action,'id' => $elem_id)));
		}
	}
	
	
	public function serviceAdd($params=false)
	{
		$this->render('service_add',array('arResult' => $params));
	}
	
	
}