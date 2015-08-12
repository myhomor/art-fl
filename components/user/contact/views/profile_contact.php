<?
//use Yii;
use yii\helpers\Html;?>

<?if($items){?>
<div class='wr-ubar-contact'>
	<!--<div class='head'>Контакты</div>-->
	<div class='cont'>
	<ul>
	<?foreach($items as $item=>$val):
		if(!empty($val)):?>
		<li>
			<div><?=$label_name[$item]?></div>
			<div><?=$val?></div>
		</li>
		<?endif;
	endforeach?>
	</ul>
	</div>
</div>
<?}else if(Yii::$app->user->ID == $user_id)
	echo Html::a(
			'Добавить Контакты',
			Yii::$app->getUrlManager()->createUrl(['/user/settings/contact']),
			['class'=>'btn btn-success']
		);
?>