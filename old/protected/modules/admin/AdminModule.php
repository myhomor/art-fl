<?php

class AdminModule extends CWebModule
{
	
	public $defaultController = 'admin';
	public $moduleUrl = __DIR__;
	public $layout = 'admin.views.layouts.content';
  
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'admin.models.*',
			'admin.components.*',
		));
	}
	
	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action)
			//AND Yii::app()->user->checkAccess('administrator')
		)
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
			
	}
	
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
	
	
/* 
	public function getAssetsUrl()
	{
		if ($this->_assetsUrl === null)
			$this->_assetsUrl = Yii::app()->getAssetManager()->publish(
				Yii::getPathOfAlias('admin.assets') );
		return $this->_assetsUrl;
	} */
	

}
