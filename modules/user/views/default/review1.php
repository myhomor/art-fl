<?
use app\components\includePlace\WInclude;
$this->registerCssFile('/css/user/main.css');
?>
<div class='row'>
	<div class='col-md-3'>
		<?=WInclude::widget([
			'file'=>'left_user_colomn',
			'user'=>$user,
		])?>
	</div>
<style>
.wr-user-review{
	display: inline-block;
	padding: 15px 0px;
}

.wr-user-review div.wr-left {
	float: left;
	width: 20%;
	margin-right: 10px;
}
.wr-user-review div.wr-right{
	float:left;
	width:78%;
}

.wr-user-review div.u-ico{
	margin-bottom: 10px;
}
.wr-user-review div.u-ico img
{
	width:100%
}
.wr-user-review div.u-name{
	margin-bottom: 10px;
}
.wr-user-review div.u-name p{
	font-size:13px;
}

.type-rew{
	padding: 3px 10px;
	color: #fff;
	display: inline-block;
	border-radius: 3px;
}


</style>
	<div class='col-md-9'>
		<div class='wr-ubar'>
			<div class='wr-box-info'>
				<div class='head'>Отзывы</div>
				<div class='content'>
					<div class='wr-user-review'>
						<div class='wr-left'>
							<div class='u-ico'>
								<img src="http://cs622617.vk.me/v622617506/d7c5/wpVDEawIoxU.jpg">
							</div>
							<div class='u-name'>
								<a href='/user/<?=$user->LOGIN?>'><p>Алеша Попович</p></a>
							</div>
							<div class='type-rew btn-success'>Хорошо</div>
						</div>
						<div class='wr-right'>
							<div class='txt'>
								Здравствуйте! Мое имя Станислав, я занимаюсь графическим дизайном профессионально c 2006 года. На фрилансе с 2010 года. За это время было успешно завершено БОЛЕЕ 450 ПРОЕКТОВ, выиграно БОЛЕЕ 35 КОНКУРСОВ (в том числе и на международной арене (www.logomyway.com) Я готов предложить Вам услуги по разработке логотипов, фирменных стилей, созданию бренд- и гайд-буков, а так же полиграфических материалов Со своей стороны я могу гарантировать индивидуальный подход, порядочность, внимательность к пожеланиям и критике, а так же строгое следование установленным срокам. 
							</div>
						</div>
					
					</div>
					
					<div class='wr-user-review'>
						<div class='wr-left'>
							<div class='u-ico'>
								<img src="http://cs622617.vk.me/v622617506/d7c5/wpVDEawIoxU.jpg">
							</div>
							<div class='u-name'>
								<a href='/user/<?=$user->LOGIN?>'><p>Алеша Попович</p></a>
							</div>
							<div class='type-rew btn-warning'>Средне</div>
						</div>
						<div class='wr-right'>
							<div class='txt'>
								Здравствуйте! Мое имя Станислав, я занимаюсь графическим дизайном профессионально c 2006 года. На фрилансе с 2010 года. За это время было успешно завершено БОЛЕЕ 450 ПРОЕКТОВ, выиграно БОЛЕЕ 35 КОНКУРСОВ (в том числе и на международной арене (www.logomyway.com) Я готов предложить Вам услуги по разработке логотипов, фирменных стилей, созданию бренд- и гайд-буков, а так же полиграфических материалов Со своей стороны я могу гарантировать индивидуальный подход, порядочность, внимательность к пожеланиям и критике, а так же строгое следование установленным срокам. 
							</div>
						</div>
					
					</div>
					
					<div class='wr-user-review'>
						<div class='wr-left'>
							<div class='u-ico'>
								<img src="http://cs622617.vk.me/v622617506/d7c5/wpVDEawIoxU.jpg">
							</div>
							<div class='u-name'>
								<a href='/user/<?=$user->LOGIN?>'><p>Алеша Попович</p></a>
							</div>
							<div class='type-rew btn-danger'>Плохо</div>
						</div>
						<div class='wr-right'>
							<div class='txt'>
								Здравствуйте! Мое имя Станислав, я занимаюсь графическим дизайном профессионально c 2006 года. На фрилансе с 2010 года. За это время было успешно завершено БОЛЕЕ 450 ПРОЕКТОВ, выиграно БОЛЕЕ 35 КОНКУРСОВ (в том числе и на международной арене (www.logomyway.com) Я готов предложить Вам услуги по разработке логотипов, фирменных стилей, созданию бренд- и гайд-буков, а так же полиграфических материалов Со своей стороны я могу гарантировать индивидуальный подход, порядочность, внимательность к пожеланиям и критике, а так же строгое следование установленным срокам. 
							</div>
						</div>
					
					</div>
				</div>
			</div>
		</div>
	
		<pre><?print_r($arResult)?></pre>
	</div>
</div>
