<?php

namespace app\modules\user\controllers;

use Yii;
use yii\data;
use yii\web\HttpException;
use yii\helpers\Url;

use app\modules\user\models\CUser;
use app\modules\user\models\CUsersContact;
use app\modules\user\models\settings\UserForm;
use app\modules\user\models\settings\ServiceForm;
use app\modules\user\models\services\CUserServices;



class SettingsController extends \yii\web\Controller
{
	public $user;
	//get params
	public $_a = null;
	public $_id = null;
	public function beforeAction($action)	
	{	
		if(\Yii::$app->user->isGuest)
			throw new HttpException(404, 'Page not found');
		else
		{
			if(Yii::$app->request->get('_a'))
				$this->_a = Yii::$app->request->get('_a');
			if(Yii::$app->request->get('_id'))
				$this->_id = Yii::$app->request->get('_id');
			
			$this->user = CUser::findOne(Yii::$app->user->ID);
			return parent::beforeAction($action);
		}
	}


    public function actionIndex()
    {	
		return $this->actionUser();
    }
	
	public function actionUser()
	{
		
		$model = new UserForm();
		$model->_user = $this->user;
		if(Yii::$app->request->isPost)
		{
			$model->attributes = Yii::$app->request->post('UserForm');
			$model->update();
        }
		
		
		return $this->render(
			'user',
			array(
				'user' => $this->user,
				'model' => $model,
				'post' => Yii::$app->request->post('UserForm'),
			)
		);
	}
	
	public function actionContact()
	{
		$model = new \app\modules\user\models\settings\ContactForm();
		
		/* 
		проверим на наличия записи в таблице контактов
		если ее нет - создадим запись в таблице
		*/
		if($this->user->ID_CONTACT)
		{
			$contact = CUsersContact::findOne($this->user->ID_CONTACT);
			$model->_contact = $contact;
		}
		else
		{
			$modelContact = new CUsersContact();
			$modelContact->USER_ID = $this->user->ID;
			$modelContact->save();
			
			$this->user->ID_CONTACT = $modelContact->ID;
			$this->user->update();
			
			$contact = $modelContact;
			
			$model->_contact = $modelContact;
			unset($modelContact);
		}
		
		
		if(Yii::$app->request->post('ContactForm'))
		{
			$model->attributes = Yii::$app->request->post('ContactForm');
			$model->update();
		}
		
		return $this->render(
			'contact',
			array(
				'model' => $model,
				'post' => Yii::$app->request->post('ContactForm'),
				'user' => $this->user,
				'contact' => $contact,
			)
			
		);
	}
	
	public function actionService()
	{
		if(is_null($this->_a))
			$this->_a = 'list';
		
		switch ($this->_a)
		{
			case 'list':
			{
				$query = CUserServices::find()->byUserID(Yii::$app->user->ID);
				$countQuery = clone $query;
				
				$pages = new data\Pagination(['totalCount' => $countQuery->count()]);
				//$pages->defaultPageSize = 1;
				$model = $query->offset($pages->offset)
					->limit($pages->limit)
					->all();

				return $this->render( 
					'service/list',
					array(
						'user' => $this->user,
						'model' => $model,
						'pages' => $pages
					)
				);
				break;
			}
			case 'add':
			{
				$model = new ServiceForm();
				
				if(Yii::$app->request->isPost)
				{
					$model->attributes = Yii::$app->request->post('ServiceForm');
					if($model->save())
						$this->redirect('/user/settings/service/',302);
				}
				return $this->render(	
					'service/add',
					array(
						'user' => $this->user,
						'model' => $model
					)
				);
				break;
			}
			case 'detail':
			{
				if(is_null($this->_id))
					throw new HttpException(404, 'Element not found');
				else
				{
					$service = CUserServices::find()->byID($this->_id);
					$model = new ServiceForm();
					
					$model->model_service = $service;
					if($model->checkModel())
					{	
						if(Yii::$app->request->isPost)
						{
							$model->attributes = Yii::$app->request->post('ServiceForm'); 
							
							if($model->update())
								$this->redirect('/user/settings/service',302);
						}
						
						return $this->render(	
								'service/detail',
								array(
									'user' => $this->user,
									'model' => $model,
									'service' => $service
								)
							);
					}
					else
						throw new HttpException(404, 'Element not found');
				}
				break;
			}
			case 'delete':
			{
				if(is_null($this->_id))
					throw new HttpException(404, 'Element not found');
				else
				{
					$model = CUserServices::find()->byID($this->_id);
					if($model AND $model->ID_USER === $this->user->ID)
					{	
						if($model->delete())
							$this->redirect('/user/settings/service/',302);
						else 
							throw new HttpException(404, 'No delete'); 
							
					}
					else
						throw new HttpException(404, 'Element not found');
				}
				break;
			}
		}
	}
	
	public function actionPortfolio()
	{
		return $this->render(
					'portfolio',
					array(
						'user' => $this->user,
						//'model' => $model,
						//'service' => $service
					)
				);
	}
}
