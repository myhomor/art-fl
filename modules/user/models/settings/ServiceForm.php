<?
namespace app\modules\user\models\settings;

use Yii;
//use yii\web\UploadedFile;
use app\modules\user\models\CUser;
use app\modules\user\models\services\CUserServices;

class ServiceForm extends yii\base\Model
{
	public $model_service;
	
	public $name;
	public $data_create;
	public $data_chenge;
	public $active;
	public $detail_text;
	public $id_currency;
	public $time_to_work;
	public $id_user;
	public $price;
	public $avatar;
	public $more_file;
	
	/* service options */
	public $s_name;
	public $s_price;
	public $s_detail_text;
	public $s_id_currency;	
	
	
	public function rules()
    {
        return [
            [['name','time_to_work','price'], 'required'],
			[['name','detail_text','active','data_create','data_chenge','time_to_work','more_file'], 'string'],
			[['price','id_currency','id_user'], 'integer'],
            //[['avatar'], 'file', 'extensions' => 'jpg, png', 'mimeTypes' => 'image/jpeg, image/png'],
		];
    }
	public function attributeLabels()
	{
		return [
			'name' => 'Название',
			'data_create' => 'Дата создания',
			'data_chenge' => 'Дата редактирования',
			'active' => 'Активность',
			'detail_text' => 'Описание',
			'id_currency' => 'Валюта',
			'time_to_work' => 'Время на работу',
			'price' => 'Цена',
			'avatar' => 'Картинка анонса',
			'more_file' => 'Дополнительные файлы',
		];
	}
	
	 public function attributeModel()
    {
        return [
            'name' => 'NAME',
			'data_create' => 'DATE_CREATE',
			'data_chenge' => 'DATE_LAST_CHANGE',
			'active' => 'ACTIVE',
			'detail_text' => 'DETAIL_TEXT',
			'id_currency' => 'ID_CURRENCY',
			'time_to_work' => 'TIME_TO_WORK',
			'price' => 'PRICE',
			'avatar' => 'AVATAR',
			'more_file' => 'MORE_FILE',
        ];
    }
	
	
	public function findByID($id = null)
	{
		return $this->model_service = CUserServices::find()->byID($id);
	}
	
	public function checkModel()
	{
		return $this->model_service;
	}
	
	public function save()
	{
		$model = new CUserServices();
		if($this->validate())
		{
			/* задаем атрибуты модели контактов относительно атрибутов формы */
			$arAttr = $this->attributeModel();
			foreach($arAttr as $key=>$val)
				$model->$val = $this->$key;

			$model->ID_USER = Yii::$app->user->ID;
			$model->ID_CURRENCY = 1;
			$model->ACTIVE = 'Y';
			$model->DATE_CREATE = date("Y-m-d H:i:s");
			$model->DATE_LAST_CHANGE = date("Y-m-d H:i:s");
		
			return $model->save();
		}
		else
			return false;
	}
	
	public function update()
	{
		if($this->validate() && $this->model_service)
		{
			$this->active = ($this->active ? 'Y' : 'N');
			
			/* задаем атрибуты модели контактов относительно атрибутов формы */
			$arAttr = $this->attributeModel();
			foreach($arAttr as $key=>$val)
				$this->model_service->$val = $this->$key;
				
				$this->model_service->DATE_LAST_CHANGE = date("Y-m-d H:i:s");
			return $this->model_service->update();
		}
		else
			return false;
	}
}