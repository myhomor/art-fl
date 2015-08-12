<?php

namespace app\modules\gallery\controllers;

use Yii;
use app\modules\user\models\CUser;
use yii\web\HttpException;

class DefaultController extends \yii\web\Controller
{
	public $photo;
	protected $user;
	
	public function beforeAction($action)	
	{	
		$this->photo = Yii::$app->request->get('photo');
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
	
	public function actionIndex()
    {
		
			
        return $this->render(
					'index', 
					['user' => $this->user]
				);
    }
}
 