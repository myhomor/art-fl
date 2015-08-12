<?
class UGetDate
{
	public static function setQuery($sql)
	{
		$connection=Yii::app()->db;
		$dataReader = $connection->createCommand($sql)->queryAll();
		return $dataReader;
	}
	
	
	public static function getCity($id = false)
	{
		if(!$id) $sql='SELECT * FROM core_city';
		else $sql ='SELECT * FROM core_city WHERE ID = '.$id;
		
		return UGetDate::setQuery($sql);
	}
	
	public static function getCountry($id = false)
	{
		if(!$id) $sql='SELECT * FROM core_country';
		else $sql ='SELECT * FROM core_country WHERE ID = '.$id;
		
		return UGetDate::setQuery($sql);
	}
	public static function arPrint($array = false)
	{
		echo '<pre>'; print_r($array); echo '</pre>';
	}
	
	
	public static function listTags($type)
	{
		if(!isset($type))
			return false;
		else
		{
			//$model = new Tags();
			//$model->attributes = array('FLANCE','CUSTOMER','PROJECT');
			if($type == 'F' || $type == 'C')
				$sql ='SELECT * FROM core_tags WHERE '.($type == 'F' ? "`FLANCE`" : "`CUSTOMER`").' = 1';
			elseif($type == 'P')
				$sql ='SELECT * FROM core_tags WHERE `CUSTOMER` = 1 AND `PROJECT` = 1';
				
			/* elseif($type == 'C')
			{
				$result = Tags::model->find(
						array(),
						array('CUSTOMER' => '1'),
						array('condition'=>'ACTIVE="Y"'));
			}
			elseif($type == 'P')
			{
				$result = Tags::model->find(
						array(),
						array('CUSTOMER' => '1','PROJECT' => '1'),
						array('condition'=>'ACTIVE="Y"'));
			} */
			return UGetDate::setQuery($sql);
		}
	}
	
	
	
}
?>