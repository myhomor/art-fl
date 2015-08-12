<?
use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
?>

<div class="list-group">
	<?foreach($items as $item)
	{
		$params = false;
		if(isset($item['getParams']))
		{
			foreach($item['getParams'] as $key=>$val)
			{
				if(!is_int($key))
				 	$params[$key] = $val;
				else
					$params[$val] = $getParams[$val];	
			}	
			array_unshift($params, $item['url']);
		}
		
		if(isset($item['visible']) && $item['visible'] == 'private' && $user_id === Yii::$app->user->ID)
			echo Html::a(
				$item['label'],
				($params ? Url::to($params) : $item['url']),
				['class'=>'list-group-item']
			);
		elseif(!isset($item['visible']) OR $item['visible'] == 'public') 
			echo Html::a(
				$item['label'],
				($params ? Url::to($params) : $item['url']),
				['class'=>'list-group-item']
			);
	}?>
</div>