<?App::includeCSS('css/profile.css');?>
<div class='row'>
	<div class="col-md-12">
		<h1 class="page-head-line">Настройки профиля: Сервисы</h1>
	</div>
</div>

<div class='row'>
	<div class='col-md-12'>
		<?$this->widget(
			'application.extensions.renderMenu.WClass', 
			array( 
				'name' => 'p_settings',//имя файла меню. по умолчанию берется имя шаблона
				'template' => 'p_settings',//имя шаблона. по умолчанию index
			)
		)?>
	</div>
	
	
	<div class='wr-s-content'>
		<div class='col-md-12'>
			ServiceADD
		</div>
	</div>
</div>
<?UGetDate::arPrint($arResult)?>