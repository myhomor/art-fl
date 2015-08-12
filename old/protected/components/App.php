<?
class App extends Controller
{
	public static function setQuery($sql)
	{
		$connection=Yii::app()->db;
		$dataReader = $connection->createCommand($sql)->queryAll();
		return $dataReader;
	}
	
	public function pathToTempl()
	{
		return Yii::app()->request->baseUrl .'/'.$this->tempDir .'/'. Yii::app()->theme->name;
	}
	

	public function includeModule($params=false)
	{
		$_error = array();
		if(!$params)
			array_push($_error,'EMPTY PARAMS');
		else{
			$_nmodule = mb_strtolower($params['module']);
			$_controller =  (!$params['controller'] ? $_nmodule : $params['controller']);
			
			if(isset(Yii::app()->modules[$_nmodule]))
			{
				$action = (!$params['action'] ? 'actionIndex' : $params['action']);
				$module	= Yii::app()->getModule($_nmodule);
				
				$controller	= Yii::app()->createController( $module->id.'/'.$_controller );
				
				$result	= $controller[0]->$action($params['params']);
			}else
				array_push($_error,'UNKNOWN MODULE '.$_nmodule);
				
			/* if(count($_error))
				return $_error;
			else	 */
				return $result;
		}
	}
	
	
	public function includeJS($url=false,$position=null)
	{
		if(!$url)
			return false;
		else
		{	
			if($url[0] != '/')
				$url = App::pathToTempl() .'/'.$url;
			else	
				$url = Yii::app()->request->baseUrl .$url;
		
			$cs = Yii::app()->getClientScript();
			if(!is_null($position))
			{
				switch ($position) {
					case 'POS_HEAD':
						$cs->registerScriptFile(
								$url,
								CClientScript::POS_HEAD
							);
						break;
					case 'POS_BEGIN':
						$cs->registerScriptFile(
								$url,
								CClientScript::POS_BEGIN
							);
						break;
					case 'POS_END':
						$cs->registerScriptFile(
								$url,
								CClientScript::POS_END
							);
						break;
					default:
						$cs->registerScriptFile($url);
				}
			}
			else
				$cs->registerScriptFile($url);
		}
	}
	
	
	public function includeCSS($url=false)
	{
		if(!$url)
			return false;
		else
		{
			if($url[0] != '/')
				$url = App::pathToTempl() .'/'.$url;
			else	
				$url = Yii::app()->request->baseUrl .$url;
				
			return Yii::app()->getClientScript()->registerCssFile($url);
		}
	}
	
	public function includePlace($params=false)
	{
		/* $defPath =	Yii::app()->request->baseUrl .'protected/include';
		$file = ($params['path'] ? $params['path'] : $defPath).'/'.$params['file'].'.php';
		if(!$params)
			return false;
		else
			if(file_exists($file)
				return include($file);
			else  */
				return false;
	}
	
	public function AjaxLink($label=false,$url=false,$params=false,$data=false)
	{
		if(!$label OR !$url OR !$params)
			return false;
		else
		{
			$params['type'] = strtoupper($params['type']);
			$token = array('YII_CSRF_TOKEN'=> ($params['type'] == 'POST' ? Yii::app()->request->csrfToken : 'false'));
			
			if($data) 
				$data = array_merge($data,$token);
			else 
				$data = $token;
			
			return CHtml::ajaxLink(
					$label,
					//($data ? array_unshift($data, $url) : $utl),
					$url,
					array(
						'type' => ($params['type'] ? $params['type'] : 'POST'),
						'beforeSend' => $params['beforeSend'],
						'success' => $params['success'],
						'data' => $data,
						'cache'=> ($params['cache'] ? mb_strtolower($params['type']) : 'false'),
					),
					$params['htmlOptions'],
					array('csrf'=>true)
				);
		}
	}
	
	public function generateString($count = 5)
	{
		$arr = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','r','s','t','u','v','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','R','S','T','U','V','X','Y','Z','1','2','3','4','5','6','7','8','9','0'/* ,'.',',','(',')','[',']','!','?','&','^','%','@','*','$','<','>','/','|','+','-','{','}','`','~' */);
   
		$string = "";
		for($i = 0; $i < $count; $i++)
		{
		  // Вычисляем случайный индекс массива
		  $index = rand(0, count($arr) - 1);
		  $string .= $arr[$index];
		}
		return $string;
	}
	
	
	public function setERROR($code=false,$mess=false)
	{
		if(!$code)
			return false;
		else
			throw new CHttpException($code, 'Ой, записи не найдено!');
	}
	
	
	/* public function checkController($class=false)
	{
		if(!$class)
			return false;
		else
		{
			$class = strtoupper($class);
			$class = ucfirst($class);
			$class .='Controller';
			if(class_exists($class))
				return $class;
			else
				return false;
		}
	} */
	
	
	public function checkAction($class=false,$action=false)
	{
		if(!isset($class) || !isset($action))
			return false;
		else
		{
			//$action = ucfirst($action);
            if (in_array($action, get_class_methods($class)))
				return $action;
			else
				return false;
		}
	}
	
	 
	 
	 
	public static function getCity($id = false)
	{
		if(!$id) $sql='SELECT NAME FROM core_city WHERE ACTIVE = "Y"';
		else $sql ='SELECT NAME FROM core_city WHERE ACTIVE = "Y" AND ID = '.$id;
		
		if($row = App::setQuery($sql))
		{
			foreach($row as $res)
				$result[] = $res['NAME'];
			
			array_unshift($result, 'не выбрано');
		}
		
		return $result;
	}
	
	public static function getCountry($id = false)
	{
		if(!$id) $sql='SELECT * FROM core_country';
		else $sql ='SELECT * FROM core_country WHERE ID = '.$id;
		
		if($row = App::setQuery($sql))
		{
			foreach($row as $res)
				$result[] = $res['NAME'];
				
			array_unshift($result, 'не выбрано');
		}
		return $result;
	}
}
?>