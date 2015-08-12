<?
//$this->registerCssFile('/css/user/main.css');
$this->registerCssFile('/css/user/service.css');

use yii\helpers\Html;
use yii\helpers\Url; 
use yii\bootstrap\ActiveForm;

$this->title = $service->NAME;
$this->params['breadcrumbs'][] = ['label' => $user->LOGIN, 'url' => ['/user/'.$user->LOGIN]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class='row'>
	<div class='col-md-12'>
		<div class='wr-detail-service'>
			<div class='bx-user'>
				<div class='ico'>
					<img src='<?=$user::getAvatar($user->PERSONAL_AVATAR)?>'>
				</div>
				<div class='uname'>
					<a href='<?=Url::to(['/user/default/index', 'login'=>$user->LOGIN])?>'><?=$user->PERSONAL_NAME?> <?=$user->PERSONAL_LASTNAME?></a>
				</div>
				
			</div>
			<div class='detail'>
				<h2><?=$service->NAME?></h2>
				<div class='txt'>
					<?=$service->DETAIL_TEXT?>
				</div>
				
				<?=\app\components\user\review\WReview::widget([
					'type' => 'service',
					'service' => $service,
					'title' => 'Отзывы пользователей'
				])?>
			</div>
			
		</div>
	</div>
</div>