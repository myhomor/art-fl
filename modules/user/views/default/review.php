<?
$this->registerCssFile('/css/user/main.css');
$this->registerCssFile('/css/user/review.css');
?>
<div class='row'>
	<div class='col-md-3'>
		<?= \app\components\includePlace\WInclude::widget([
			'file'=>'left_user_colomn',
			'user'=>$user,
		])?>
	</div>
<style>

</style>
	<div class='col-md-9'>
	<?= \app\components\user\review\WReview::widget([
			'type' => 'user',
			'user_id' => $user->ID,
			'review_model' => $review_model,
			'title' => 'Отзывы пользователей',
			'count_on_page' => 10,
			'linkCss' => 'N'
		])?>
	
	</div>
</div>
