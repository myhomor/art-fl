<?php
namespace app\modules\user\controllers;

use Yii;
use yii\web\HttpException;
use yii\helpers\Url;

use app\modules\user\models\CUser;
use app\modules\user\models\services\CUserServices;
use app\modules\user\models\ReviewForm;
//use app\modules\user\models\services\CUserServicesReview;
use yii\data\Pagination;
//use yii\filters\AccessControl;
//use yii\filters\VerbFilter;
//use app\models\ContactForm;

class DefaultController extends \yii\web\Controller 
{
	protected $user;
	public $elem_id;

	public function beforeAction($action)	
	{	
		$this->elem_id = Yii::$app->request->get('_id');
		if(!Yii::$app->user->isGuest OR Yii::$app->request->get('login'))
		{
			if(!Yii::$app->request->get('login'))
				$this->user = CUser::findOne(Yii::$app->user->ID);
			else
				if(!$this->user = CUser::find()->byLogin(Yii::$app->request->get('login')))
					throw new HttpException(404, 'User not found');
				
			return parent::beforeAction($action);
		}
		else
			$this->redirect('/login',302);
	}
	
	public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }
	
    public function actionIndex()
    {
		return $this->render('index', ['user'=>$this->user]);
	}
	
	
	public function actionService()
	{
		if($this->elem_id)
		{
			$service = CUserServices::find()->byID($this->elem_id);
			
			if(!Yii::$app->user->isGuest AND Yii::$app->user->ID !== $service->ID_USER)
				$review_model = new ReviewForm(['scenario' => ReviewForm::R_SERVICE]);
			
			if(Yii::$app->request->post('ReviewForm') && $review_model->load($_POST))
			{
				//передаем владельца станицы 
				$review_model->user = $this->user;
				
				$review_model->id_service = $service->ID;
				
				if($review_model->saveServiceReview())
					$this->redirect(Url::to(''));
			}
			
			return $this->render(
					'service/detail',
					[
						'user'=>$this->user,
						'service' => $service,
						'review_model' => $review_model

					]
				);
		}
		else
		{
			$query = CUserServices::find()->byUserID($this->user->ID,true);
			$countQuery = clone $query;
				
			$pages = new Pagination(['totalCount' => $countQuery->count()]);
			$pages->defaultPageSize = 1;
			$model = $query->offset($pages->offset)
					->limit($pages->limit)
					->all();
			
			return $this->render(
						'service/list',
						[
							'user'=>$this->user,
							'services' => $model,
							'pages' => $pages
						]
					);
		}
	}
	
	public function actionReview()
	{
		if(!Yii::$app->user->isGuest AND Yii::$app->user->ID !== $this->user->ID)
			$review_model = new ReviewForm(['scenario' => ReviewForm::R_USER]);
					
		if(Yii::$app->request->post('ReviewForm') && $review_model->load($_POST))
		{
			//передаем владельца станицы 
			$review_model->user = $this->user;
			
			if($review_model->saveUserReview())
				$this->redirect(Url::to(''));
		}
		
		return $this->render(
					'review',
					[
						'user'=>$this->user,
						'review_model' => $review_model
					]
				);
	}
}