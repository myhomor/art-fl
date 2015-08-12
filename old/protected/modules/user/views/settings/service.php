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
	
	<div class='col-md-12'>
		<ul>
			<?=CHtml::link('Добавить','/user/settings/service/add/')?>
		</ul>
	</div>
	
	<div class='wr-s-content'>
		<div class='col-md-12'>
			<div class="panel panel-default">
				<div class="panel-heading" style='background-color: #91D5A4;'>
                    Типовые услуги
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table">
							<thead>
								<tr>
									<th>#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Username</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
									<td>1</td>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
			</div>
			
			<div></div>
		</div>
	</div>
</div>
<?//UGetDate::arPrint($arResult)?>