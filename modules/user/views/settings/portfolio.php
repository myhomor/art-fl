<?
use app\components\includePlace\WInclude;
$this->registerCssFile('/css/user/main.css');
?>
<div class='row'>
	<div class='col-md-3'>
		<?=WInclude::widget([
			'file'=>'left_user_colomn',
			'user'=>$user,
		])?>
	</div>
	
	<div class='col-md-9'>
		<pre><?print_r($arResult)?></pre>
	</div>
</div>
