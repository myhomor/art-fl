<?php

class DefaultController extends Controller
{
/* 	public function actionIndex()
	{
		$this->render('index');
	} */
	
	/* public function getMainMenu() {
	   //$dbQuery = Menu::model()->findAll(); //Если используете ActiveRecord
		$menuItems = array();
		$dbQuery = array(
			array('name' => 'this is 1', 'url' => '/sda1/'),
			array('name' => 'this is 2', 'url' => '/sda2/'),
			array('name' => 'this is 3', 'url' => '/sda3/'),
		);
		
	   foreach($dbQuery as $item) {
		  $menuItems[] = array('label'=>$item->name, 'url'=>$item->url);
	   }
	   return $menuItems;
	} */
} 