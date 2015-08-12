<?php
namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\modules\user\models\CUser;
use app\modules\user\models\RegistrationForm as RegForm;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
	
	public function actionTest()
	{
		/* $file = \yii\web\UploadedFile::getInstance($model,'file');
		\yii\helpers\VarDumper::dump($file);
			$file_path = '/web/upload/' . $file->baseName . '.' . $file->extension;
			 
			$file->saveAs($file_path); */
		$model = new \app\modules\user\models\settings\UserForm();
		$model->load(\Yii::$app->request->getBodyParams());
		
		$file = \yii\web\UploadedFile::getInstance($model,'avatar');
		//\yii\helpers\VarDumper::dump($file);
		if($file)
		{
			$file_path = '/upload/' . $file->baseName . '.' . $file->extension;
			$file->saveAs($file_path);
		}
		return $this->render('test',
						[
						'file_path'=>$file_path,
						'file' => $file,
						'model' => $model,
						]
					);
	}
	
    public function actionIndex()
    {
        return $this->render('index');
    }
	
    public function actionLogin()
    {
       /*  if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
		print_r($model->getUser());
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        } */
		
		$model = new LoginForm();
		
		if($_POST['LoginForm'])
		{
			$model->username = $_POST['LoginForm']['username'];
			$model->password = $_POST['LoginForm']['password'];
			$model->rememberMe = $_POST['LoginForm']['rememberMe'];
			$model->login();
			
			$this->redirect('/user',302);
		}
		
		 return $this->render('login', [
                'model' => $model,
				'user' => $_POST['LoginForm']
            ]);
    }
	
	public function actionRegistration()
	{
		$model = new RegForm();
		$model->setAttributes($_POST['RegistrationForm']);
		
		if($model->validate())
		{
			$model->registeration();
		
			return $this->render(
						'final_reg_step',
						[
						'post' => $_POST['RegistrationForm'],
						'model' => $model,
						]
					);
		}
		else	
			return $this->render(
						'registration',
						[
						'post' => $_POST['RegistrationForm'],
						'model' => $model,
						]
					);
	}

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }
	
	public function actionActivekey($type=null,$code=null)
	{
		if(!is_null($type) AND !is_null($code))
		{
			if($type == 'registration')
			{
				if($user = CUser::find()->byEmailToken($code))
				{
					$user->ACTIVE = CUser::STATUS_ACTIVE;
					$user->EMAIL_CONFIRM_TOKEN = '';
					$user->update();
				}	
			}	
		}
		
		$this->redirect('/login',302);
	}

    public function actionAbout()
    {
        return $this->render('about');
    }
}
