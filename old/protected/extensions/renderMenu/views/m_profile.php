<?function printLink($item, $user)
{?>
	<li>
	
	<?
	if(!isset($item['createUrl']) OR $item['createUrl'] != 'N')
		$createUrl = true;
	else 
		$createUrl = false;
		
		
	if(!$item['ajax'] || !count($item['ajax']))
	{
		echo CHtml::Link(
				$item['label'],
				($createUrl ? Yii::app()->createUrl($item['url'], array('login' => $user->LOGIN)) : $item['url'])
			);
	}
	else
	{	
		echo App::AjaxLink(
				$item['label'],
				($createUrl ? Yii::app()->createUrl($item['url'], array('login' => $user->LOGIN)) : $item['url']),
				$item['ajax']
			);
			
	}?>	
	</li>
<?}?>

<?if($items):?>
<ul class='ul-menu'>
	<?foreach($items as $item):
		if(!isset($item['visible']) OR $item['visible'] == 'public')
			printLink($item,$user);
		elseif(isset($item['visible'])
			AND $item['visible'] == 'private' 
			AND $user->ID == Yii::app()->user->ID)
			printLink($item, $user);
			
	endforeach;?>
<?//=$user_id?>	
</ul>
<?//=$user->LOGIN?>
<?//UGetDate::arPrint($user)?>

<?endif?>