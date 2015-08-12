<?
namespace app\modules\user\models;

use Yii;
//use app\modules\user\models\CUser;

class ReviewForm extends yii\base\Model
{
	/* status review */
	const S_GOOD = 'G';
	const S_BAD = 'B';
	const S_NORMAL = 'N';
	
	const R_SERVICE = 'r_service';
	const R_USER = 'r_user';
	
	
	public $detail_text;
	public $status;
	public $id_service;
	public $user;
	
	public function rules()
    {
        return [
			[['detail_text','id_service'],'required', 'on' => self::R_SERVICE],
			[['detail_text',],'required', 'on' => self::R_USER],
			[['detail_text'],'string' ],
			[['id_service'], 'integer'],
			[['status'], 'string', 'max' => 1]
		];
    }
	
	public function attributeLabels()
	{
		return [
			'detail_text' => 'Текст'
			//'status' => 
		];
	}
	
	protected function attributeUserReview()
	{
		return [
			'detail_text' => 'DETAIL_TEXT',
			'status' => 'STATUS_REVIEW',
			];
	}
	
	protected function attributeServiceReview()
	{
		return [
			'detail_text' => 'DETAIL_TEXT',
			'status' => 'STATUS_REVIEW',
			'id_service' => 'ID_SERVICE',
			];
	}
	
	protected function setUserRating()
	{
		switch($this->status)
		{
			case(self::S_GOOD):
			{
				$this->user->PERSONAL_SOUL = $this->user->PERSONAL_SOUL + 1;
				$this->user->PERSONAL_SOUL_PLUS = $this->user->PERSONAL_SOUL_PLUS + 1;
				return $this->user->update();
				break;
			}
			
			case(self::S_BAD):
			{
				$this->user->PERSONAL_SOUL = $this->user->PERSONAL_SOUL - 1;
				$this->user->PERSONAL_SOUL_MINUS = $this->user->PERSONAL_SOUL_MINUS + 1;
				return $this->user->update();
				break;
			}
			
			case(self::S_NORMAL):
			{
				return false;
				break;
			}
			
			default:
			{
				return false;
				break;
			}
		}		
	}
	
	public function saveServiceReview()
	{
		if($this->validate())
		{
			/* задаем атрибуты модели контактов относительно атрибутов формы */
			
			$arAttr = $this->attributeServiceReview();
			$model = new \app\modules\user\models\services\CUserServicesReview();
			foreach($arAttr as $key=>$val)
				$model->$val = $this->$key;
			
			$model->ACTIVE = 'Y';
			$model->ID_USER_CREATE = Yii::$app->user->ID;
			$model->ID_USER_CHANGE = null;
			$model->DATE_CREATE = date("Y-m-d H:i:s");
			$model->DATE_LAST_CHANGE = null;
			
			$this->setUserRating();
			return $model->save();
		}
		else
			return false;
	}
	
	public function saveUserReview()
	{
		if($this->validate())
		{
		
		/* задаем атрибуты модели контактов относительно атрибутов формы */
			$arAttr = $this->attributeUserReview();
			$model = new \app\modules\user\models\CUsersReview();
			foreach($arAttr as $key=>$val)
				$model->$val = $this->$key;
			
			$model->ID_USER = $this->user->ID;
			$model->ACTIVE = 'Y';
			$model->ID_USER_CREATE = Yii::$app->user->ID;
			$model->ID_USER_CHANGE = null;
			$model->DATE_CREATE = date("Y-m-d H:i:s");
			$model->DATE_LAST_CHANGE = null;
			
			$this->setUserRating();
			return $model->save();
		}
		else
			return false;
	}
}
?>