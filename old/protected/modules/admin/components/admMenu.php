<?php
Yii::import('zii.widgets.CPortlet');
class admMenu extends CPortlet
{
	public $name;
	public $path;
	
	protected function getItems()
	{
		if(isset($this->path) AND file_exists($this->path .'/params/items_menu/'. $this->name .'_Menu.php'))
			return include_once ($this->path .'/params/items_menu/'. $this->name .'_Menu.php');
		else
			return false;
	}
	
    protected function renderContent()
    {	
        $this->render($this->name .'_Menu', array('path' => $this->path , 'items' => $this->getItems()));
    }
}