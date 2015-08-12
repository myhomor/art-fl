<?class ContactClass extends CWidget
{
	public $user_id;
	public $template;
	
	public function getContact()
	{
		return App::includeModule(
			array(
				'module' => 'Profile', 
				'action' => 'getUserContact', 
				'params' => array('u_id' => $this->user_id)
			)
			);
	}
	
	public function run()
    {	
		if(!$this->user_id) 
			$this->user_id = Yii::app()->user->ID;
		
		$arResult = array(
			'u_id' => $this->user_id,
			'content' => $this->getContact(),
			'atrLabel' => UserContact::model()->attributeLabels(),
			);
		
        $this->render(
			($this->template ? $this->template : 'index'),
			array(
				'arResult' => $arResult,
			)
		);
    }
}