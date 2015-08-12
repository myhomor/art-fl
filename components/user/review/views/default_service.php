<?
use Yii;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

//$this->registerJsFile('/ckeditor/ckeditor.js', ['position' => \yii\web\View::POS_HEAD]);
if($linkCss)
	$this->registerCssFile('/css/user/review.css');
?>
<script>
$(document).ready(function(){
	$('.ch-status li').click(function()
	{
		$('.ch-status li').removeClass('active');
		$(this).addClass('active');
		$(".review_status input").eq($(this).index()).click();
	});
});
</script>

<div class='review'>
	<h4><?=($title ? $title : 'Отзывы')?> <?(!$review_count?: '<span class="badge pull-right">' .$review_count. '</span>')?></h4>
	
	<div class='wr-review'>
	<?if(!$review_list){?>
		<div class="alert alert-info">
			На данный момент еще никто не оставил своего душманского отзыва :(
		</div>
	<?}else{?>
		<?foreach($review_list as $review):?>
		<div class='review-itm mb15'>
			<div class='ico'>
				<img src="<?=$review['user_create']['avatar']?>"/>
			</div>
			<div class='txt'>
				<div class='t-header mb10'>
					<div>
						<div class='t-h-box'>
							<div class='col-md-6'>
								<a href="<?=$review['user_create']['url']?>"><?=$review['user_create']['name']?> <?=$review['user_create']['lastname']?></a> 
								[<a href="<?=$review['user_create']['url']?>"><?=$review['user_create']['login']?></a>]
							</div>
							<div class='col-md-6 text-right'>
								<?=$review['data_create']?>
							</div>
						</div>
					</div>
					<?switch ($review['status'])
					{
						case $status['good']:
							echo '<div type="button" class="label label-success btn-lg"><span class="glyphicon glyphicon-plus"></span> Понравилось</div>';
							break;
						case $status['bad']:
							echo '<div type="button" class="label label-danger btn-lg"><span class="glyphicon glyphicon-minus"></span> Не понравилось</div>';
							break;
						case $status['normal']:
							echo '<div type="button" class="label label-default btn-lg"> Воздержусь</div>';
							break;
					}
						
					?>
				</div>
				<div class='t-content'>
					<?=$review['message']?>
				</div>
			</div>
		</div>
		<?endforeach;
	}	
	?>
	<?if($pages):?>
		<div class='col-md-12 text-right'>
			<?= \yii\widgets\LinkPager::widget([
				'pagination' => $pages,
			]);
			?>
		</div>
	<?endif?>
	</div>
	
		
	<?if($review_model){?> 
	<div class='review-itm'>
	
	<h4>Добавить отзыв</h4>
	<?$form = ActiveForm::begin(['id' => 'userReview']); ?>
		<div class='ico'>
			<img src='<?=Yii::$app->user->identity->avatar?>'/>
		</div>
		
		<div class='txt'>
		<?=$form->field($review_model, 'detail_text')->textarea(['id'=>'u_review'])->label(false)?>
			<script>//CKEDITOR.replace( 'u_review' );</script>				 
			<div class="form-group">
				<div class='foot-form'>
					<span style='display: inline-block;'>Ваша оценка услуг : </span>
					<ul class='ch-status text-left p-none' style='display: inline-block;'>
						<li class='label label-normal like'>Понравилось</li>
						<li class='label label-normal bad'>Не понравилось</li>
						<li class='label label-normal normal active'>Воздержусь</li>
					</ul>	
											
					<?$review_model->status = 'N'?>
					<?=$form->field($review_model, 'status')
									->radioList(
										[
											$status['good'] => 'Мне понравилось', 
											$status['bad'] => 'Мне не понравилось', 
											$status['normal'] => 'Воздержусь'
										],
										['visible'=>'hidden','class'=>'review_status hidden']
									)->label(false)?>
				</div>
				<div class='foot-form text-right'>
					<?=Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
				</div>
			</div>
		</div>			
		<?ActiveForm::end(); ?>
	</div>
	<?}?>
</div>