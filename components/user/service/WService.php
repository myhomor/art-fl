<?
namespace app\components\user\service;

use Yii;

class WService extends yii\base\Widget
{
	/* default count items on page | int */
	const DEF_ON_PAGE = 6;
	/* count all services | int */
	protected $countItems;
	/* count items on one page | int */
	protected $service;
	/* pages object  */
	protected $pages;
	
	public $on_page;
	public $user_id;
	public $template;
	public $login;
	public $label;
	
	
	protected function getService()
	{
		/* $query = \app\modules\user\models\services\CUserServices::find()
				->byUserID($this->user_id);
		
		$this->countItems = $query->count();
		
		$this->pages = new \yii\data\Pagination(['totalCount' => $this->countItems]);
	
		$this->pages->defaultPageSize = ($this->on_page ? $this->on_page : self::DEF_ON_PAGE);
		
		return $query->offset($this->pages->offset)
			->limit($this->pages->limit)
			->all(); */
		return \app\modules\user\models\services\CUserServices::find()
				->where('ID_USER = :id AND ACTIVE = "Y"',[':id'=>$this->user_id])
				->limit(($this->on_page ? $this->on_page : DEF_ON_PAGE))
				->all();
	}
	
	protected function getLogin()
	{
		return ($this->user_id ? \app\modules\user\models\CUser::find()->getLoginByID($this->user_id) : false);
	}
	
	public function init()
	{
		parent::init();
		if($this->user_id)
			$this->service = $this->getService();
	}
	
	public function run()
	{
		
		return $this->render(
			($this->template ? $this->template : 'index'),
			[
			'services' => $this->service,
			'pages' => $this->pages,
			'user_id' => $this->user_id,
			'login' => ($this->login ? $this->login : $this->getLogin()),
			'label' => $this->label
			]
		);
	}
}
?>