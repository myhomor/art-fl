<?
use Yii;
use yii\helpers\Html;
use app\components\includePlace\WInclude;
use app\components\user;

$this->registerCssFile('/css/user/main.css');
//$this->registerJsFile('/js/jq.2.1.4.js',['position'=>POS_HEAD]);
?>
<script src="/js/jq.2.1.4.js"></script>
<!--
<script src="/js/collagePlus.js"></script>
<script src="/js/collagePlus/jquery.collageCaption.min.js"></script>
<script src="/js/collagePlus/jquery.removeWhitespace.js"></script>
-->


<div class='row'>
	
	<div class='col-md-3'>
		<?=WInclude::widget([
			'file'=>'left_user_colomn',
			'user'=>$user,
		])?>
	</div>
	
	<style>
		.itm-list {
		  float: left;
		  padding: 5px 4px;
		  width: 33%;
		}
		.itm-list img {
		  box-shadow: 0px 3px 4px #dcdcdc;
		  border-radius: 6px;
		  border: 4px solid #FFF;
		  width: 100%;
		}
	</style>
	
	
	<div class='col-md-9'>
		<div class='wr-ubar'>
			<?if($user->PERSONAL_ABOUT_TEX OR Yii::$app->user->ID == $user->ID):?>
			<div class='wr-box-info'>
				<h3>О себе</h3>
				<div class='content'>
				<?
				if($user->PERSONAL_ABOUT_TEX)
					echo $user->PERSONAL_ABOUT_TEX;
				else
					echo Html::a(
							'Добавить информацию',
							Yii::$app->getUrlManager()->createUrl(['/user/settings/user']),
							['class'=>'btn btn-success']
						);
				?>
				</div>
			</div>
			<?endif?>
			<div class='wr-box-info'>
				<h3>Последние работы <small>(14)</small></h3>
				<div class='content'>
					<div class='itm-list'>
						<img src="http://placehold.it/320x300/E0E4CC/ffffff">
					</div>
					<div class='itm-list'>
						<img src="http://placehold.it/320x300/E0E4CC/ffffff">
					</div>
					<div class='itm-list'>
						<img src="http://placehold.it/320x300/E0E4CC/ffffff">
					</div>  
  
				</div>
			</div>
			
			<div class='wr-box-info'>
			<?=user\service\WService::widget([
				'template'=>'index',
				'user_id'=>$user->ID,
				'label' => 'Типовые услуги',
				//'on_page' => 1
			])?>
			</div>
			
			
		</div>
		<?//print_r($user)?>
	</div>
</div>
