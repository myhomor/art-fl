<?php

class DefaultController extends Controller
{
	public function actionIndex($login=false)
	{
		if(Yii::app()->user->isGuest AND !$login)
			$this->redirect(Yii::app()->homeUrl.'login');
		else
		{
			if(!$login)
				$user = AppUser::GetByID(Yii::app()->user->ID);
			else
				$user = AppUser::GetByLogin($login); 
			
			if($user)
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
			
				$this->render('index', array('model'=>$model, 'user'=>$user));
			}
			else 
				App::setERROR(404);
		}
	}
	
	public function actionService($login=false)
	{
	 	if(Yii::app()->user->isGuest AND !$login AND !$_POST['user_id'])
			$this->redirect(Yii::app()->homeUrl.'login');
		else
		{
			if(!$login AND !$_POST['user_id'])
				$user = AppUser::GetByID(Yii::app()->user->ID);
			elseif($login)
				$user = AppUser::GetByLogin($login); 
			elseif($_POST['user_id'])
				$user = AppUser::GetByID($_POST['user_id']);
			
			if($user)
			{
				if(Yii::app()->request->isAjaxRequest)
					$this->renderPartial(
							'service',
							array(
								'arResult'=>array(
									'user'=>$user,
									'login'=>$login,
									'post' => $_POST['user_id']
								)
							)
					);
				else
					$this->render(
							'service',
							array(
								'arResult'=>array(
									'user'=>$user,
									'login'=>$login
								)
							)
					);
			}
			else
				App::setERROR(404);
		}
	}
	
	
	
	public function actionPortfolio($login=false)
	{
	 	if(Yii::app()->user->isGuest AND !$login AND !$_POST['user_id'])
			$this->redirect(Yii::app()->homeUrl.'login');
		else
		{
			if(!$login AND !$_POST['user_id'])
				$user = AppUser::GetByID(Yii::app()->user->ID);
			elseif($login)
				$user = AppUser::GetByLogin($login); 
			elseif($_POST['user_id'])
				$user = AppUser::GetByID($_POST['user_id']);
			
			if($user)
			{
				if(Yii::app()->request->isAjaxRequest)
					$this->renderPartial(
							'portfolio',
							array(
								'arResult'=>array(
									'user'=>$user,
									'login'=>$login,
									'post' => $_POST['user_id']
								)
							)
					);
				else
					$this->render(
							'portfolio',
							array(
								'arResult'=>array(
									'user'=>$user,
									'login'=>$login
								)
							)
					);
			}
			else
				App::setERROR(404);
		}
	}
	
	
	
	public function actionReview($login=false)
	{
	 	if(Yii::app()->user->isGuest AND !$login AND !$_POST['user_id'])
			$this->redirect(Yii::app()->homeUrl.'login');
		else
		{
			if(!$login AND !$_POST['user_id'])
				$user = AppUser::GetByID(Yii::app()->user->ID);
			elseif($login)
				$user = AppUser::GetByLogin($login); 
			elseif($_POST['user_id'])
				$user = AppUser::GetByID($_POST['user_id']);
			
			if($user)
			{
				if(Yii::app()->request->isAjaxRequest)
					$this->renderPartial(
							'review',
							array(
								'arResult'=>array(
									'user'=>$user,
									'login'=>$login,
									'post' => $_POST['user_id']
								)
							)
					);
				else
					$this->render(
							'review',
							array(
								'arResult'=>array(
									'user'=>$user,
									'login'=>$login
								)
							)
					);
			}
			else
				App::setERROR(404);
		}
	}

}