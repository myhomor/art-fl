<?//UGetDate::arPrint($model)?>
<?//UGetDate::arPrint($post['User'])?>

<?
App::includeJS('js/jquery.datetimepicker.js','POS_BEGIN');
App::includeCSS('css/jquery.datetimepicker.css');
App::includeCSS('css/profile.css');?>
<script>
//http://xdsoft.net/jqplugins/datetimepicker/
$(document).ready(function(){
	jQuery('.fff').datetimepicker({
	 lang:'ru',
	 i18n:{
	  ru:{
	   months:[
		'Январь','Февраль','Март','Апрель',
		'Май','Июнь','Июль','Август',
		'Сентябрь','Октябрь','Ноябрь','Декабрь',
	   ],
	   dayOfWeek:[
		"Пн.", "Вт.", "Ср.", "Чт.", 
		"Пт.", "Сб.", "Вс.",
	   ]
	  }
	 },
	 timepicker:false,
	 startDate: '1970/01/01',
	// maxDate: '2009/12/31',
	 yearStart: '1970',
	 yearEnd: '2009',
	 todayButton:false,
	 format:'Y.m.d'
	// format:'d.m.Y'
	});
});
</script>




<div class='row'>
	<div class="col-md-12">
		<h1 class="page-head-line">Настройки профиля: Общие настройки</h1>
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
			<div class='panel panel-default'>
				
				<?=CHtml::beginForm()?>
				
				<?if(CHtml::errorSummary($model)):?>
				<div class='alert alert-danger'>
					<?=CHtml::errorSummary($model)?>
				</div>
				<?endif?>
				<div class='panel-body'>
					<form>
						
						<div class="form-group "> 
							<?=CHtml::activeLabel($model,'PERSONAL_NAME')?>
							<?=CHtml::activeTextField(
										$model,
										'PERSONAL_NAME',
										array(
											'class' => 'form-control', 
											'value'=> ($model->PERSONAL_NAME ? $model->PERSONAL_NAME : '')
										)
								);?>
						</div>
						
						<div class="form-group "> 
							<?=CHtml::activeLabel($model,'PERSONAL_LASTNAME')?>
							<?=CHtml::activeTextField(
										$model,
										'PERSONAL_LASTNAME',
										array(
											'class' => 'form-control', 
											'value'=> ($model->PERSONAL_LASTNAME ? $model->PERSONAL_LASTNAME : '')
										)
								);?>
						</div>
						<div class="form-group "> 
							<?=CHtml::activeLabel($model,'EMAIL')?>
							<?=CHtml::activeTextField(
										$model,
										'EMAIL',
										array(
											'class' => 'form-control', 
											'value'=> ($model->EMAIL ? $model->EMAIL : '')
										)
								);?>
						</div>
						<div class="form-group "> 
							<?=CHtml::activeLabel($model,'PERSONAL_BDAY')?>
							<?=CHtml::activeTextField(
										$model,
										'PERSONAL_BDAY',
										array( 
											'class' => 'form-control fff', 
											'value'=> ($model->PERSONAL_BDAY ? $model->PERSONAL_BDAY : '')
										)
								);?>
						</div>
						<div class="form-group "> 
							<?=CHtml::activeLabel($model,'PERSONAL_ABOUT_TEX')?>
							<?=CHtml::activeTextarea(
										$model,
										'PERSONAL_ABOUT_TEX',
										array(
											'class' => 'form-control', 
											'value'=> ($model->PERSONAL_ABOUT_TEX ? $model->PERSONAL_ABOUT_TEX  : '')
										)
								);?>
						</div>
						
						<div class="form-group "> 
							<?=CHtml::activeLabel($model,'ID_CITY')?>
							<?=CHtml::activeHiddenField(
										$model,
										'ID_CITY',
										array(
											'class' => 'form-control ID_CITY',
											'value'=> ($model->ID_CITY ? $model->ID_CITY  : '')
										)
							); ?>
							<?=CHtml::dropDownList(
								'ID_CITY', 
								($model->ID_CITY ? $model->ID_CITY : ''), 
								App::getCity(),
								array('class' => 'form-control inpHid')
							);?>
						</div>
						
						<div class="form-group "> 
							<?=CHtml::activeLabel($model,'ID_COUNTRY')?>
							<?=CHtml::activeHiddenField(
										$model,
										'ID_COUNTRY',
										array(
											'class' => 'form-control ID_COUNTRY',
											'value'=> ($model->ID_COUNTRY ? $model->ID_COUNTRY  : '')
										)
							); ?>
							
							<?=CHtml::dropDownList(
								'ID_COUNTRY', 
								($model->ID_COUNTRY ? $model->ID_COUNTRY : ''), 
								App::getCountry(), 
								array('class' => 'form-control inpHid')
							);?>
						</div> 
						
						<div class="submit a-center">
							<?=CHtml::submitButton('Сохранить',array('class'=>'btn bg-green btn-big'));?>
						</div>
						
					</form>
				</div>
				<?CHtml::endForm()?>
			</div>
		</div>
	</div>
	<?//UGetDate::arPrint($model)?>
	<?//UGetDate::arPrint($_POST)?>
</div> 

