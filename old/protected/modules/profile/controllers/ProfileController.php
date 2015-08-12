<?php

class ProfileController extends Controller
{
	
	public $defaltProfile = 'F';
	
	/* public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	} */

	public function generateProfile()
	{
		$model = new Profile();
		$model->save();
		return $model->ID;
	}
	
	/* public function initModule($params)
	{
		if(!$par)
	} */
	
	public function actionIndex($params=false)
	{
		/* if($user = $params['user'])
		{
			if($user->ID_PROFILE_FLANCE AND !$user->ID_PROFILE_CUSTOMER)
				$model['PROFILE_FLANCE'] = Profile::model()->findByPk($user->ID_PROFILE_FLANCE);
			
			elseif(!$user->ID_PROFILE_FLANCE AND $user->ID_PROFILE_CUSTOMER)
				$model['PROFILE_CUSTOMER'] = Profile::model()->findByPk($user->ID_PROFILE_CUSTOMER);
		
			elseif($user->ID_PROFILE_FLANCE AND $user->ID_PROFILE_CUSTOMER)
			{
				$model['PROFILE_FLANCE'] = Profile::model()->findByPk($user->ID_PROFILE_FLANCE);
				$model['PROFILE_CUSTOMER'] = Profile::model()->findByPk($user->ID_PROFILE_CUSTOMER);
			}
			 */
			$this->render('index', array('model'=>$model, 'user'=>$user));
		//}
		//else
		//	return false;
	}
	
	public static function actionPortfolio($params=false)
	{
		if(!$params AND !$params['user'])
			App::setERROR(404);
		else
		{
			App::includeModule(
						array(	
							'module' => 'gallery',
							'action' => 'getUserGallery',
							'params' => $params,
						)
					);	
		}
	}
	
	public static function actionService($params=false)
	{
		if(!$params AND !$params['user'])
			App::setERROR(404);
		else
		{
			App::includeModule(
						array(	
							'module' => 'service',
							'action' => 'actionUserService',
							'params' => $params,
						)
					);	
		}
	}
	
	public static function actionReview($params=false)
	{
		if(!$params AND !$params['user'])
			//App::setERROR(404);
			echo 'ds';
		else
		{
			App::includeModule(
						array(	
							'module' => 'Review',
							'action' => 'actionUserReview',
							'params' => $params,
						)
					);	
		}
	}
	
	/* public static function actionSettings($params=false)
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
					/// TODO переделать на подключение контроллера
					App::includeModule(
						array( 
							'module' => 'profile',
							'controller' => 'setting',
							'action' => ($action ? 'action'.$action : 'actionSettings'),
							'params' => array(
								'user' => $user
							)
						)
					); 
			}
		}
	} */
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	public static function getUserContact($params)
	{
		$model = new UserContact();
		$row = $model->findAll("USER_ID = :id", array(":id" => $params['u_id']));
		if(!$row)
		{
			if($params['u_id'] == Yii::app()->user->ID)
			{
				$model->USER_ID = Yii::app()->user->ID;
				$model->save();
				
				$this->getUserContact(array('u_id'=>Yii::app()->user->ID));
				
				return $row[0]->attributes;
			}
			else
				return false;
		}
		else
			return false;
	}
	public function actionSetRating($type=false)
	{
		$this->render('index', array('tt'=>$type));
	}
	
	
	public function getUserRating($params)
	{
		if($params)
		{
			$model = User::model()->findByPk($params['u_id']);
			return array(
					'plus' => $model->attributes['PERSONAL_SOUL_PLUS'], 
					'minus' => $model->attributes['PERSONAL_SOUL_MINUS']
					);
		}
		else
			return false;
	}
	
	
	public function getUserIndex($params)
	{
		$user = User::model()->find('ID=:ID', array(':ID'=>$params['user_id']));
		if(!$user){
			//$this->actionError();
			//$error = Yii::app()->errorHandler->error;
			//$this->render('error', array('error' => $error));
			throw new CHttpException(404, 'Ой, записи не найдено!');
		}
		else
			$this->getProfile($user,$params);
	} 
	
}