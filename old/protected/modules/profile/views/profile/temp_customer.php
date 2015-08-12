<?php
/* @var $this DefaultController */

/* $this->breadcrumbs=array(
	$this->module->id,
); */
?>
<script>
/* $('#content').on('click','.getCont', function(){
	console.log('qwr');
}); */
</script>

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
			Контакты
		</div>
	</div>
	<div class="col-md-4">
		<div class='wr-col-box'>
			рейтинг
		</div>
	</div>
</div>
<div class="col-md-12">

	<?/* $menu = $this->widget(
		'application.extensions.renderMenu.WClass', 
		array( 
			'name' => 'p_main',//имя файла меню. по умолчанию берется имя шаблона
			'template' => 'return',//имя шаблона. по умолчанию index
		)
	) */?>
	
</div>
<div class='up-content' id='prof-content'></div>

<?//='State '.Yii::app()->user->getState('title')?>
<?UGetDate::arPrint($model)?>
<?UGetDate::arPrint($user)?>
<p>
You may customize this page by editing <tt><?php echo __FILE__; ?></tt>
</p>
