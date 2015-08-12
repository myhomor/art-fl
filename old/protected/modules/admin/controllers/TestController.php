<?php

class TestController extends Controller
{ 
	/* public function filters()
    {
        return array(
            'accessControl',
        );
    }
	public function accessRules()
    {
        return array(
           
			array('allow',  // allow all users to perform 'list' and 'show' actions
				'actions'=>array('index'),
				'roles'=>array('administrator'),
			),
			
            array('deny',
                'actions'=>array('index'),
                'roles'=>array('guest'),
            ),
        );
    } */
	

	public function actionIndex()
	{
		$this->render('index',array('params' => $id));
	}
} 