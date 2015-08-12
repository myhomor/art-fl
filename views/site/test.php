<?
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use app\components\menu\WMenu;

/* 
$this->title = 'Настройки профиля';
$this->params['breadcrumbs'][] = ['label' => $user->LOGIN, 'url' => ['/user/']];
$this->params['breadcrumbs'][] = $this->title; */

//$this->registerJsFile('/ckeditor/ckeditor.js', ['position' => \yii\web\View::POS_HEAD]);
?>
<?print_r($_POST['UserForm'])?>
<div class='row'>
	<div class='col-md-3'>
	</div>
	<div class='col-md-9'>
		<div class='wr-cont-box'>
			<?$form = ActiveForm::begin(['id' => 'userUpdate', 'options' => ['enctype' => 'multipart/form-data']]); ?>
			<?=Html::error($model,'avatar') ?>
			<?=$form->field($model, 'avatar')->fileInput() ?>
		
			<?if($file)
			{
				echo '<pre>';
				print_r($file);
				echo '</pre>';
				
			}?>
			<?if($attr)
			{
				echo '<pre>';
				print_r($attr);
				echo '</pre>';
				
			}?>
			
			<p>путь к картинке: <?=$file_path?></p>
			<?=(!$file_path ? false : 'Картинка <img src="'.$file_path.'"/>')?>
            <div class="form-group">
                <?=Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
            </div>
            <?ActiveForm::end(); ?>
			
			
		</div>
	</div>
</div>