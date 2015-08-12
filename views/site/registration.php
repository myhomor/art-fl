<?
use Yii;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>
<?=date("Y-m-d")?>
<div class="user-default-login">
    <h1><?= Html::encode($this->title) ?></h1>

	<pre><?//print_r($model)?></pre>
    <div class="row">
        <div class="col-lg-5">
           <?$form = ActiveForm::begin(['id' => 'registeration']); ?>
            <?=$form->field($model, 'username')->input('text', ['value' => $post['username']])?>
            <?=$form->field($model, 'lastname')->input('text', ['value' => $post['lastname']])?>
            <?=$form->field($model, 'email')->input('text', ['value' => $post['email']])?>
			<?=$form->field($model, 'password')->passwordInput()?>
        
            <div class="form-group">
                <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>