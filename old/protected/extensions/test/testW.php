<?php
class testW extends CWidget
{
	public $username = '';
    
	public function run()
    {
		$this->render('index', array(
            'username' => $this->username,
        ));
    }
}