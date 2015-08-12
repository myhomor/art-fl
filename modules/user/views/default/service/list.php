<?
$this->registerCssFile('/css/user/main.css');
?>
<div class='row'>
	<div class='col-md-3'>
		<?= \app\components\includePlace\WInclude::widget([
			'file'=>'left_user_colomn',
			'user'=>$user,
		])?>
	</div>
	<div class='col-md-9'>
		<h2>Типовые услуги</h2>
		<?foreach($services as $service):?>
			<div class="col-sm-6 col-md-4">
				<div class="thumbnail">
					<div class='box-ico'>
						<img src="http://placehold.it/320x300/E0E4CC/ffffff" >
						<div class='box-price'><?=$service->PRICE?> р</div>
					</div>
					<div class="caption">
						<h4><?=$service->NAME?></h4>
						<p><a href="<?=\yii\helpers\Url::toRoute(['/user/default/service/', 'login'=>$user->LOGIN,'_id'=>$service->ID])?>" class="btn btn-primary" role="button">Подробнее</a></p>
					</div>
				</div>
			</div>
		<?endforeach?>
	</div>
</div>