<?php
class WClass extends CWidget
{
	public $user;
	public $user_id;
	public $name;
	public $template;
	
	/* get elements from iterms folder */
	protected function getItems()
	{
		if(file_exists(__DIR__ .'/items/'. ($this->name ? $this->name : $this->template) .'.php'))
			return include_once (__DIR__ .'/items/'. ($this->name ? $this->name : $this->template) .'.php');
		else
			return false;
	}
	
	/* public function AjaxLink($label=false,$url=false,$params=false)
	{
		if(!$label OR !$url OR !$params)
			return false;
		else
		{
			$params['type'] = strtoupper($params['type']);
			return CHtml::ajaxLink(
					$label,
					$url,
					array(
						'type' => ($params['type'] ? $params['type'] : 'POST'),
						'beforeSend' => $params['beforeSend'],//'function() {$("#prof-content").text("loading");}',
						'success' => $params['success'],//'function(data) {$("#prof-content").text(data);}',
						'data' => array(
							'YII_CSRF_TOKEN'=> ($params['type'] == 'POST' ? Yii::app()->request->csrfToken : 'false'),
							'user_id' => $this->ID,
						),
						'cache'=> ($params['cache'] ? mb_strtolower($params['type']) : 'false'),
					),
					$params['htmlOptions'],
					array('csrf'=>true)
				);
		}
	} */
	
    public  function run()
    {	
        $this->render(
			($this->template ? $this->template : 'index'),
			array(
				'items' => $this->getItems(),
				'user_id' => $this->user_id,
				'user' => $this->user
			)
		);
    }
}