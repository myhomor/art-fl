<script>
$(document).ready(function(){
	$('.inpHid').change(function(){
		$('input.'+$(this).attr('name')).val($(this).val());
		console.log($(this).val());
		console.log($(this).attr('name'));
	//	console.log("$('input.'"+$(this).attr('name')+").val("+$(this).val()+")");
	});
});
</script>
<h2 class='page-head-line'>Регистрация</h2>
<div class='row'>
	<div class='col-md-6 col-sm-6'>
	<?=CHtml::beginForm()?>
		<div class='form panel panel-default'>
			<?if(CHtml::errorSummary($model)):?>
			<div class='alert alert-danger'>
				<?=CHtml::errorSummary($model)?>
			</div>
			<?endif?>
			<div class='panel-body'>
				<div class="form-group "> 
				<?//$model->type_profile = 'F'?>
				<?=CHtml::activeLabel($model,'type_profile')?>*
				<?=CHtml::activeHiddenField($model,'type_profile', array('class'=>'CH_PROF','value'=> ($_POST['User']['type_profile'] ? $_POST['User']['type_profile'] : '')))?>
				<div>
				<?=CHtml::radioButtonList(
					'CH_PROF',
					($_POST['User']['type_profile'] ? $_POST['User']['type_profile'] : ''), 
                    array(
                        'F'=>'Я художник',
                        'C'=>'Я заказчик',
                    ),
                    array('class'=>'inpHid')
                );?>	
				</div>
				</div>
				<div class="form-group "> 
				<?=CHtml::activeLabel($model,'PERSONAL_NAME')?>*
				<?=CHtml::activeTextField($model,'PERSONAL_NAME',array('class' => 'form-control')); ?>
				</div>
				
				<div class="form-group "> 
				<?=CHtml::activeLabel($model,'PERSONAL_LASTNAME')?>*
				<?=CHtml::activeTextField($model,'PERSONAL_LASTNAME',array('class' => 'form-control')); ?>
				</div>
				
				<div class="form-group "> 
				<?=CHtml::activeLabel($model,'EMAIL')?>*
				<?=CHtml::activeTextField($model,'EMAIL',array('class' => 'form-control')); ?>
				</div>
				
				<div class="form-group "> 
				<?=CHtml::activeLabel($model,'PASSWORD')?>*
				<?=CHtml::activePasswordField($model,'PASSWORD',array('class' => 'form-control')); ?>
				</div>
				
				<div class="form-group "> 
				<?=CHtml::activeLabel($model,'PASSWORD_REPEAT')?>*
				<?=CHtml::activePasswordField($model,'PASSWORD_REPEAT',array('class' => 'form-control')); ?>
				</div>
				
				<div class='tit-bl'>Настройки профиля</div>
				
				<div class="form-group "> 
				<?=CHtml::activeLabel($model,'ID_CITY')?>
				<?=CHtml::activeHiddenField($model,'ID_CITY',array('class' => 'form-control ID_CITY')); ?>
				<?=CHtml::dropDownList(
					'ID_CITY', 
					($_POST['User'] ? $_POST['User']['ID_CITY'] : ''), 
					App::getCity(),
					array('class' => 'form-control inpHid')
				);?>
				<?//UGetDate::arPrint(App::getCity())?>
				</div>
				
				<div class="form-group "> 
				<?=CHtml::activeLabel($model,'ID_COUNTRY')?>
				<?=CHtml::activeHiddenField($model,'ID_COUNTRY',array('class' => 'form-control ID_COUNTRY')); ?>
				<?=CHtml::dropDownList(
					'ID_COUNTRY', 
					($_POST['User'] ? $_POST['User']['ID_COUNTRY'] : ''), 
					App::getCountry(), 
					array('class' => 'form-control inpHid')
				);?>
				</div> 
				
				<?=CHtml::activeHiddenField($model,'ID_CURRENCY',array('value'=>'1'));?>
				<?=CHtml::activeHiddenField($model,'ID_LANG',array('value'=>'1'));?>
				
				<div class="submit a-center">
					<?=CHtml::submitButton('Зарегистрироваться',array('class'=>'btn bg-green btn-big'));?>
				</div>
			</div>
		</div>
	<?CHtml::endForm()?>
	</div>
</div>
<?=App::checkLogin('mail');?>
<?UGetDate::arPrint($_POST['User'])?>
<?//UGetDate::pArray($pp)?>