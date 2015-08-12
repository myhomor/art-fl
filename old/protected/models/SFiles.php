<?
class SFile extends CActiveRecord {
    
	const F_SAVE = 'save';
	public $image;
	
 
    public function rules(){
        return array(
            //устанавливаем правила для файла, позволяющие загружать
            // только картинки!
            array('image', 'file', 'types'=>'jpg, gif, png'),
        );
    }
}