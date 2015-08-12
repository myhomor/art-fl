<?
namespace app\components\user\review;

use Yii;
use yii\helpers\Url;

use app\modules\user\models\CUser;
use app\modules\user\models\services\CUserServicesReview;
use app\modules\user\models\CUsersReview;
use app\modules\user\models\ReviewForm;

class WReview extends \yii\base\Widget
{
	/* кол-во элементов на страничке */
	const COUNT_ON_PAGE = 5;
	
	/* 
	*
	* $template / шаблон вывода / string	
	* $type / тип отзывов / string / user|service
	* $service / модель сервиса, для которого щим отзывы / object
	* $user_id / ID пользователя, которому принадлежат отзывы / integer
	* $title / заголовок странцы / string
	* $count_on_page / кол-во элементов на странице
	* $linkCss / флаг подключения стилей / string[1] / Y | N
	* $review_model / модель нового отзыва для фомы / object
	*
	*/
	
	public $template;
	public $type;
	public $service;
	public $user_id;
	public $title;
	public $count_on_page;
	public $linkCss;
	public $review_model;
	
	
	/* 
	*
	*$pages - разбивка на страницы
	*$query_review - селект на выборку отзывов
	*$review_list - модель с элементов на странице
	*default_temp - имя дефолтного шаблона
	*status - кодировка статусов
	*
	*/
	
	/* 
	TODO: доделать вывод ошибок и проверки на неправильный тип
	*/
	protected $errors = [];
	protected $pages;
	protected $query_review;
	protected $review_list;
	protected $default_temp;
	protected $status = [
				'good' => ReviewForm::S_GOOD,
				'bad' => ReviewForm::S_BAD,
				'normal' => ReviewForm::S_NORMAL,
				];
	/* 
	*
	*
	*
	*
	*/

	public function init()
	{
		parent::init();
		
		if(!$this->type)
			return false;
		else 
		{
			if($this->type == 'service' && $this->service)
			{
				/* выполним селект */
				$this->query_review = CUserServicesReview::find()
										->where('ID_SERVICE = :id AND ACTIVE = "Y"',[':id' => $this->service->ID])
										->orderBy(['ID'=>SORT_DESC]);
				/* если модель нового отзыва не передана - создадим новую */
				if(!Yii::$app->user->isGuest AND !$this->review_model AND Yii::$app->user->ID !== $this->service->ID_USER)
					$this->review_model = new ReviewForm(['scenario' => ReviewForm::R_SERVICE]);
			}
			elseif($this->type == 'user' && $this->user_id)
			{
				$this->query_review = CUsersReview::find()
										->where('ID_USER = :id AND ACTIVE = "Y"',[':id' => $this->user_id])
										->orderBy(['ID'=>SORT_DESC]);
										
				if(!Yii::$app->user->isGuest AND !$this->review_model AND Yii::$app->user->ID !== $this->user_id)
					$this->review_model = new ReviewForm(['scenario' => ReviewForm::R_USER]);
			}
	
			$count = clone $this->query_review;
			$onPage = ($this->count_on_page > 0 ? $this->count_on_page : self::COUNT_ON_PAGE);
			
			/* разобьем результат селекта постранично */
			$this->pages = new \yii\data\Pagination(['totalCount' => $count->count()]);
			$this->pages->defaultPageSize = $onPage;
			
			/* получим модель отзывов на одной странице */
			$this->review_list = $this->query_review->offset($this->pages->offset)
						->limit($this->pages->limit)
						->all();
						
			$this->default_temp = 'default_'.$this->type;
		}
	}
	
	protected function getReview()
	{
		if(!$this->review_list)
			return false;
		else
		{
			$usersID = [];
			foreach($this->review_list as $review)
			{
				array_push($usersID, $review['ID_USER_CREATE']);
				$arReview[] = [
					'u_id' => $review['ID_USER_CREATE'],
					'status' => $review['STATUS_REVIEW'],
					'message' => $review['DETAIL_TEXT'],
					'data_create' => $review['DATE_CREATE'],
					'data_chenge' => $review['DATE_LAST_CHANGE'],
					'active' => $review['ACTIVE'],
				];
			}
			$usersID = array_unique($usersID);
			
			if(count($usersID))
				$users = CUser::findAll($usersID);
				
			if(!$users)
				return false;
			else
			{	
				foreach($users as $user)
					$arUsers[$user['ID']] = $user->attributes;
				unset($users);
				
				foreach($arReview as $key => $review)
				{
					$arReview[$key]['user_create']['name'] = $arUsers[$review['u_id']]['PERSONAL_NAME'];
					$arReview[$key]['user_create']['lastname'] = $arUsers[$review['u_id']]['PERSONAL_LASTNAME'];
					$arReview[$key]['user_create']['login'] = $arUsers[$review['u_id']]['LOGIN'];
					$arReview[$key]['user_create']['avatar'] = CUser::getAvatar($arUsers[$review['u_id']]['PERSONAL_AVATAR']);
					$arReview[$key]['user_create']['url'] = Url::to(['/user', 'login' => $arReview[$key]['user_create']['login']]);
				}
				//unset($users);
				return $arReview;
			}
		}
	}

	
	public function run()
	{
		if(!$this->default_temp)
			return false;
		else
			return $this->render( 
						($this->template ? $this->template : $this->default_temp),
						[
						'review_model' => $this->review_model,
						'review_list' => $this->getReview(),
						'title' => $this->title,
						'review_count' => count($this->review_list),
						'status' => $this->status,
						'pages' => $this->pages,
						'linkCss' => (!$this->linkCss || $this->linkCss !== 'N' ? true : false)
						]
					);
	}
}
?>