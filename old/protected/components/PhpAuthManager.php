<?
class PhpAuthManager extends CPhpAuthManager{
    public function init(){	
        // Иерархию ролей расположим в файле auth.php в директории config приложения
        if($this->authFile===null){
            $this->authFile=Yii::getPathOfAlias('application.config.auth').'.php';
        }
 
        parent::init();
 
        if(!Yii::app()->user->isGuest){
            // Связываем роль, заданную в БД с идентификатором пользователя,
            // возвращаемым UserIdentity.getId().
            $link= Yii::app()->db->createCommand()
					->select('CODE')
					->from('core_users_role')
					->where('ID=:id', array(':id'=> Yii::app()->user->getRole()))
					->queryRow();
			
			$this->assign($link['CODE'], Yii::app()->user->ID);
        }
    }
}
?> 