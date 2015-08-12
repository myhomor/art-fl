<?php
class UserController extends Controller
{
	public function actions()
    {
        return array( 
               'captcha'=>array(
                'class'=>'CCaptchaAction',
                'backColor'=> 0x003300,
                'maxLength'=> 3,
                'minLength'=> 3,
                 'foreColor'=> 0x66FF66,
				),
        );
    }
	
/* 
# 
#
#
#
#
#
#
*/
	
	public function actionIndex11($_pr1=false,$_pr2=false,$_pr3=false,$_pr4=false)
	{
		$arControllers = array('settings'=>'settings');
		if(Yii::app()->user->isGuest AND !$_pr1)
			$this->actionLogin();
		else
		{	
			//ищем экшен в UserController
			if($action = App::checkAction(__CLASS__,$_pr1))
				//передаем в экшен второй гет параметр
				$this->$action($_pr2);
			else
			{
				//проверим, является ли _pr1 логином
				if(!AppUser::checkLogin($_pr1))
				{
					//если не является вытаскиваем текущего пользователя
					//переназначаем параметры, тем самым модулруем url типа /site/login/action/params/
					/* $controller = $_pr1;
					$action = $_pr2;
					$actionParam = $_pr3;
					$pr5 = $_pr4;
					 */
					 
					
					$user = User::model()->find('ID=:id', array(':id'=>Yii::app()->user->ID));
					App::includeModule(
						array( 
								'module' => 'profile',
								'controller' => (array_key_exists($_pr1,$arControllers) ? $arControllers[$_pr1] : false),
								'action' => ($_pr2 ? 'action'.$_pr2 : 'initModule'),
								'params' => array(
									'user' => $user,
									'actionType' => $actionParam = array('type'=>$_pr3,'_pr4'=>$_pr4)
								)
							)
					);
				}
				else
				{
					$user = User::model()->find('ID=:id', array(':id'=>Yii::app()->user->ID));
					App::includeModule(
						array( 
								'module' => 'profile',
								'controller' => (array_key_exists($_pr1,$arControllers) ? $arControllers[$_pr1] : false),
								'action' => ($_pr2 ? 'action'.$_pr2 : 'initModule'),
								'params' => array(
									'user' => $user,
									'actionType' => $actionParam = array('type'=>$_pr3,'_pr4'=>$_pr4)
								)
							)
					);
				}
				
				
					
				if(!$user)
					App::setERROR(404);
				else
				{
						/* if($_pr2 == 'settings')
						{
							$controller = $_pr2;
							$_pr2 = 'index';
						} */
						
					/* $arControllers = array('settings');	
					
					echo '1//'.$login;
					echo '2//'.$controller;
					echo '3//'.$action;
					echo '4//'.$actionParam;
					echo '4//'.$pr5;
					App::includeModule(
						array( 
								'module' => 'profile',
								'controller' => (in_array($controller,$arControllers) ? $controller : false),
								'action' => ($action ? 'action'.$action : 'initModule'),
								'params' => array(
									'user' => $user,
									'actionType' => $actionParam
								)
							)
						); */
				}
			}
		}
		///App::setERROR(404);
	}
	
	
	
	
	/* public function actionServiceAjax($params=false)
    {
		if($_POST['user_id'])
			$params['user_id'] = $_POST['user_id'];
			
		if(!$params AND !$params['user_id'])
			return false;
		else
		{
			$result = App::includeModule(
							array( 
								'module' => 'service',
								'action' => 'actionUserServiceAjax',
								'params' => $params
							)
						);
			$this->renderPartial('ajax/service', array('arResult'=>$result), false, true);
		}			
    } */
	
	

	/* public function actionPortfolioAjax($params=false)
    {
		if($_POST['user_id'])
			$params['user_id'] = $_POST['user_id'];
			
		if(!$params AND !$params['user_id'])
			return false;
		else
		{
			$result = App::includeModule(
							array( 
								'module' => 'gallery',
								'action' => 'actionUpdateAjax',
								'params' => $params
							)
						);
			$this->renderPartial('ajax/portfolio', array('arResult'=>$result), false, true);
		}			
    } */
	
	
	/* public function actionReviewAjax($params=false)
    {
		if($_POST['user_id'])
			$params['user_id'] = $_POST['user_id'];
			
		if(!$params AND !$params['user_id'])
			return false;
		else
		{
			$result = App::includeModule(
							array( 
								'module' => 'review',
								'action' => 'actionUserReviewAjax',
								'params' => $params
							)
						);
			$this->renderPartial('ajax/review', array('arResult'=>$result), false, true);
		}			
    } */
	
	
	
	
	public $verifyCode;
	private $_identity;

    public $password_repeat;
	
	
	public function actionRegistration()
    {	
		if(Yii::app()->user->isGuest)
		{
			$model = new User(User::FLAG_REGISTER);

			// Если пришли данные для сохранения
			if(isset($_POST['User']))
			{
				$ll = explode('@', $_POST['User']['EMAIL']);
				$login = $ll[0];
				
				$model->attributes = $_POST['User'];
					
				// Проверка данных
				//TODO code pass
				if($model->validate())
				{
					if(!AppUser::checkLogin($login) AND !App::checkAction(__CLASS__,$login))
						$model->LOGIN = $login;
					else
						$model->LOGIN = AppUser::generateString(7);
					
					
					if($model->type_profile == 'F')
						$model->ID_PROFILE_FLANCE = AppUser::generateProfile();
					elseif($model->type_profile == 'C')
						$model->ID_PROFILE_CUSTOMER = AppUser::generateProfile();
					
					$model->DATE_REGISTER = date("Y-m-d H:i:s");
					$model->ACTIVE = 'Y';
					$model->ID_ROLE = 3;
					$model->ID_STATUS = 1;
					
					$model->save(false);
					$this->redirect($this->createUrl(Yii::app()->request->baseUrl .'/user'));
				}
			
			}
			$this->render("registration", array('model' => $model));
		}
		else
			$this->redirect($this->createUrl(Yii::app()->request->baseUrl .'/user'));
	}
	
	//https://toster.ru/q/73258
	//http://www.yiiframework.com/doc/guide/1.1/ru/topics.auth
	
	
    public function actionLogin($loginForm=false)
	{
		$model=new LoginForm;
		if($_POST['LoginForm']) $loginForm = $_POST['LoginForm'];
		/*
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		} */

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
			{
				$this->redirect(Yii::app()->user->returnUrl);
			}
		}
		// display the login form
		$this->render('login', array('model' => $model));
	}
	 
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	
	
	
	
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}*/
}