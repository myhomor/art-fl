<?
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Спасибо за регистрацию';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="user-default-login">
    <h1><?= Html::encode($this->title) ?></h1>
 
     <p>Спасибо за регистрацию! На почту <?=$post['email']?> отправлено письмо с кодом подтверждения. Перейдите по ссылке письма, чтобы закончить регистрацию.</p>
	<pre><?print_r($gg)?></pre>
    <div class="row">
        <div class="col-lg-5">
           wr!@#$
        </div>
    </div>
</div>