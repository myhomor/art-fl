<?php
/* @var $this DefaultController */

/* $this->breadcrumbs=array(
	$this->module->id,
); */
?>
<div class="col-md-12">
    <h1 class="page-head-line"><?=$user->LOGIN?></h1>
</div>
<div class='wr-box'>
	<div class="col-md-4">
		<div class="">
			<img src="/temp/bootstrap-main-theme/img/user.jpg" class="img-circle">
		</div>
	</div>
	<div class="col-md-4">
		<div class='wr-col-box l-r-bord'>
		<?$this->widget(
			'application.extensions.userContact.ContactClass', 
			array( 
				'template' => 'index',//имя шаблона. по умолчанию index
				'user_id' => $user->ID
			)
		)?>
		</div>
	</div>
	<div class="col-md-4">
		<div class='wr-col-box'>
		<?$this->widget(
			'application.extensions.userRating.RatingClass',
			array( 
				'template' => 'index',//имя шаблона. по умолчанию index
				'user_id' => $user->ID
			)
		)?>
		
		tt = <?=$tt?>
		</div>
	</div>
</div>

<div class="col-md-12">			
	<div class='wr-box'>
		<?$this->widget(
			'application.extensions.renderMenu.WClass', 
			array( 
				'name' => 'p_main',//имя файла меню. по умолчанию берется имя шаблона
				'template' => 'm_profile',//имя шаблона. по умолчанию index
				'user' => $user
			)
		)?>
	</div>
</div>

<?//=App:getCountry(1)?>
<?//print_r(get_class_methods('UserController'))?>
<div class='up-content' id='prof-content'></div>
<?
/* $module	= Yii::app()->getModule('profile');
$controller	= Yii::app()->createController('/profile/profile/'); */
?>
<?='State '.Yii::app()->user->getState('title')?>
ID = <?=$user->ID?>;
<?UGetDate::arPrint($user)?>
<?//UGetDate::arPrint($model)?>
<?//UGetDate::arPrint($user)?>