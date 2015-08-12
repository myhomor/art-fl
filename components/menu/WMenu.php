<?php
namespace app\components\menu;

use yii\base\Widget;
use yii\helpers\Html;

class WMenu extends Widget
{
	public $name_menu;
	public $name_temp;
	public $items;
	public $user_id;
	public $getParams;
	
	
	public function init()
	{
		parent::init();
		if($this->name_menu)
		{
			$this->items = $this->getItems();
			$this->name_temp = $this->name_temp ? $this->name_temp : $this->name_menu;
		} 	
	}
	
	protected function getItems()
	{
		if(file_exists(__DIR__ .'/items/'. ($this->name_menu ? $this->name_menu : $this->name_temp) .'.php'))
			return include_once (__DIR__ .'/items/'. ($this->name_menu ? $this->name_menu : $this->name_temp) .'.php');
		else
			return false;
	}
	
	public function run()
	{
		return $this->render( 
					$this->name_temp, 
					[
					'items' => $this->items,
					'user_id' => $this->user_id,
					'getParams' => $this->getParams
					]
				);
	}
}