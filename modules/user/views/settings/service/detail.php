<?
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;


$this->title = $service->NAME;
$this->params['breadcrumbs'][] = ['label' => $user->LOGIN, 'url' => ['/user/']];
$this->params['breadcrumbs'][] = ['label' => 'Сервисы', 'url' => ['/user/settings/service']];
$this->params['breadcrumbs'][] = $this->title; 

$this->registerJsFile('/ckeditor/ckeditor.js', ['position' => \yii\web\View::POS_HEAD]);
?>
<style>
.wr-service-form div.box{display:none}
.wr-service-form div.box.active{display:block}
</style>
<script>
$(document).ready(function(){
	$('#service-add li').click(function(){
		$('.wr-service-form div.box')
				.removeClass('active')
				.eq($(this).index())
				.addClass('active');
		$('#service-add li')
				.removeClass('active')
				.eq($(this).index())
				.addClass('active');
	})
});
</script>

<div class='row'>
	<div class='col-md-3'>
		<div class='wr-cont-box'>
			<?=\app\components\menu\WMenu::widget([
				'name_menu' => 'settings_user',
				'name_temp' => 'us_left_menu',
				'user_id'=>$user->ID,
			])?>
			
			<?=\app\components\menu\WMenu::widget([
				'name_menu' => 'settings_service_user',
				'name_temp' => 'us_left_menu',
				'user_id'=>$user->ID,
			]) ?>
		</div>
	</div>	
	<div class='col-md-9'>
		<div class='wr-cont-box'>
			
			<ul class="nav nav-tabs nav-justified mb20" id="service-add">
			  <li class="active"><a href="#">Элемент</a></li>
			  <li><a href="#">Подробно</a></li>
			 <!-- <li><a href="#">Доп услуги</a></li>-->
			</ul>

			<?$form = ActiveForm::begin(['id' => 'service-form', 'options' => ['enctype' => 'multipart/form-data']]); ?>
				<div class='wr-service-form'>
					<div class='box active'>
					<?$model->active = ($service->ACTIVE == 'Y' ? 1 : 0)?>
					<?=$form->field($model, 'active')->checkbox()?>
					<?=$form->field($model, 'name')->input('text', ['value' => $service->NAME])?>
					<?=$form->field($model, 'time_to_work')->input('text', ['value' => $service->TIME_TO_WORK])?>
					<?=$form->field($model, 'price')->input('text', ['value' => $service->PRICE])?>
					</div>
					
					<div class='box'>
					<?$model->detail_text = $service->DETAIL_TEXT?>
					<?=$form->field($model, 'detail_text')->textarea(['id'=>'ed_detail_text'])?>
					<script>CKEDITOR.replace( 'ed_detail_text' );</script>
					</div>
				</div>
			<div class="form-group">
				<?=Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
				<a href='<?=Url::to(['/user/settings/service/','_a' => 'delete', '_id' => $service->ID])?>' class='btn btn-danger'>Удалить</a>
				<a href='<?=Url::to([''])?>' class='btn btn-default'>Отмена</a>
			</div>
				<?ActiveForm::end();?>
		</div>
	</div>
</div>