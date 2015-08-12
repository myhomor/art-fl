<?php

class AdminController extends Controller
{ 
	
	public function actionIndex()
	{
		//if(!Yii::app()->user->checkAccess('administrator'))
		//$id = Yii:app()->getRequest()->getQuery('id');
		$this->render('index');
	}
	
	/* public function actionTest()
	{
		//if(!Yii::app()->user->checkAccess('administrator'))
		$this->render('test/test');
	} */
	
	
} 