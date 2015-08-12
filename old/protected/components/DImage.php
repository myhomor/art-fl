<?
class DFile extends Controller 
{
	/* public $assetsPath; // Путь к папке с ресурсами
    public $assetsUrl;	// URL папки с ресурсами
    public $thumbs = array(
        'min' => array('width' => 250, 'height' => 250),
        'mid' => array('width' => 500),
        'big' => array('width' => 1200),         
    ); */

	// Определим настройки
   /*  public function init()
    {
     //   $this->assetsUrl = Yii::app()->assetManager->baseUrl . '/upload';
     //   $this->assetsPath = Yii::app()->assetManager->basePath . '/upload';

        //if (!is_dir($this->assetsPath)) mkdir($this->assetsPath);
    } */
	public function uploadFile($file=false, $dir=false)
	{
		$model=new SFile(SFile::F_SAVE);
        if($file)
		{
            $model->attributes=$file;
            $model->image=CUploadedFile::getInstance($model,'image');
            if($model->save())
			{
                $path=Yii::app()->request->baseUrl.'/upload/';
				
				if($this->dir)
				{
					if(is_dir($this->dir)) mkdir($path.$this->dir);
			
					$path .= $this->dir .'/';
				}
				
				$path .= $model->image->getName();
                $model->image->saveAs($path);
				return $model;
            }
        }
       // $this->render('create', array('model'=>$model));
	}
} 