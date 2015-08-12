<?php
class LogoClass extends CWidget
{
	public $template;
	public $u_id;
	
	public function getUser()
	{
		$user = User::model()->findAll('ID = :id', array(':id'=>$this->u_id));
		return $user[0];
	}
	
	public function run()
    {	
		$params = array(
			'user' => $this->getUser()
		);
		
        $this->render(
			($this->template ? $this->template : 'index'),
			$params
		);
    }
}