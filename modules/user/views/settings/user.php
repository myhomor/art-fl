<?
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use app\components\menu\WMenu;


$this->title = 'Настройки профиля';
$this->params['breadcrumbs'][] = ['label' => $user->LOGIN, 'url' => ['/user/']];
$this->params['breadcrumbs'][] = $this->title;

$this->registerJsFile('/ckeditor/ckeditor.js', ['position' => \yii\web\View::POS_HEAD]);
?>
<div class='row'>
	<div class='col-md-3'>
		<div class='wr-cont-box'>
			<?=WMenu::widget([
				'name_menu' => 'settings_user',
				'name_temp' => 'us_left_menu',
				'user_id'=>$user->ID
			])?>
		</div>
	</div>
	<div class='col-md-9'>
		
		<div class='wr-cont-box'>
			<?$form = ActiveForm::begin(['id' => 'userUpdate', 'options' => ['enctype' => 'multipart/form-data']]); ?>
			<?=Html::error($model,'avatar') ?>
			<?=$form->field($model, 'avatar')->fileInput() ?>
			
			<?= \app\components\user\avatar\WAvatar::widget([
				'name_temp'=>'profile_main',
				'img_id'=>$user->PERSONAL_AVATAR,
			])?> 
				
			<?=$form->field($model, 'login')->input('text', ['value' => ($post['login'] ? $post['login'] : $user->LOGIN)])?>
			<?=$form->field($model, 'email')->input('text', ['value' => ($post['email'] ? $post['email'] : $user->EMAIL)])?>
            <?=$form->field($model, 'username')->input('text', ['value' => ($post['username'] ? $post['username'] : $user->PERSONAL_NAME)])?>
            <?=$form->field($model, 'lastname')->input('text', ['value' => ($post['lastname'] ? $post['lastname'] : $user->PERSONAL_LASTNAME)])?>
            <?=$form->field($model, 'company')->input('text', ['value' => ($post['company'] ? $post['company'] : $user->PERSONAL_COMPANY)])?>
       
			<?$model->about_text = ($post['about_text'] ? $post['about_text'] : $user->PERSONAL_ABOUT_TEX)?>
			<?=$form->field($model, 'about_text')->textarea(['class'=>'h400','id'=>'ed_about_text'])?>
			<script>CKEDITOR.replace( 'ed_about_text' );</script>
           
        
            <div class="form-group">
                <?=Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
            </div>
            <?ActiveForm::end(); ?>
			
			
		</div>
	</div>
</div>