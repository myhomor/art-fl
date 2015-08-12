<?
class SettingsController extends Controller
{	
	public function initModule($params=false)
	{
		$this->actionIndex($params);
	}


	public function actionIndex($params=false)
	{
		if(Yii::app()->user->isGuest)
			$this->redirect(Yii::app()->request->baseUrl .'/user/login/');
		else
		{
			if(!$params AND !$params['user'])
				App::setERROR(404);
			else
			{
				if($params['user']->ID != Yii::app()->user->ID)
					App::setERROR(404);
				else
				{
					$model = User::model()->findByPk($params['user']['ID']);
					
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
							'arParams' => $params,
							'user'=>$params['user'],
							'model' => $model,
							'post' => $_POST
						)
					);
				}
			}
		}
	}
	
	
	public function actionService($params=false)
	{
		$this->render('service',array('arResult' => $params,'user'=>$params['user']));
	}
	
	
	public function actionSettings($params=false)
	{
		$this->render('index',array('arResult' => $params,'user'=>$params['user']));
	}
	
	/* public function actionUserSettings($params=false)
	{	
	
		$this->render('index',array('arResult' => $params,'user_LOGIN'=>$params['user']->LOGIN));
	} */
}