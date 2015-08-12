<?
$this->registerCssFile('/css/user/main.css');
?>

<div class='row'>
	<div class='col-md-3'>
		<?=\app\components\includePlace\WInclude::widget([
			'file'=>'left_user_colomn',
			'user'=>$user,
		])?>
	</div>
	
	<div class='col-md-9'>
		protfolio
	</div>
</div>
