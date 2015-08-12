<?
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;


$this->title = 'Контакты';
$this->params['breadcrumbs'][] = ['label' => $user->LOGIN, 'url' => ['/user/']];
$this->params['breadcrumbs'][] = $this->title;?>
<div class='row'>
	<div class='col-md-3'>
		<div class='wr-cont-box'>
			<?=app\components\menu\WMenu::widget([
				'name_menu' => 'settings_user',
				'name_temp' => 'us_left_menu',
				'user_id'=>$user->ID,
			])?>
		</div>
	</div>
	<div class='col-md-9'>
		<div class='wr-cont-box'>
			
			<?$form = ActiveForm::begin(['id' => 'userUpdate', 'options' => ['enctype' => 'multipart/form-data']]); ?>

			<?=$form->field($model, 'email')->input('text', ['value' => ($post['email'] ? $post['email'] : $contact->PERSONAL_MAIL)])?>
			<?=$form->field($model, 'phone')->input('text', ['value' => $contact->PERSONAL_PHONE])?>
			<?=$form->field($model, 'site')->input('text', ['value' => $contact->PERSONAL_SITE])?>
            <?=$form->field($model, 'skype')->input('text', ['value' => $contact->PERSONAL_SKYPE])?>
            <?=$form->field($model, 'icq')->input('text', ['value' => $contact->PERSONAL_ICQ])?>
            <?=$form->field($model, 'vk')->input('text', ['value' => $contact->PERSONAL_VK])?>
            <?=$form->field($model, 'fb')->input('text', ['value' => $contact->PERSONAL_FB])?>
           
		
            <div class="form-group">
                <?=Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
            </div>
            <?ActiveForm::end(); ?>
		</div>
	</div>
</div>