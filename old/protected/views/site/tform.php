
<script>
	$(document).ready(function(){
		/* function OmegaSlider_MagicAjax(PARAMS) {
			var $arResult1 = $(PARAMS.RESULT_BOX);
			$.ajax({type: "POST",url: "/bitrix/templates/t1/ajax/bookAjax.php",data: {PARAMS: PARAMS},beforeSend: function() {
					$arResult1.html('<p style="margin-left:210px;font-size: 14px;width: 264px;text-align: center;line-height: 20px;"><img src="/bitrix/templates/t1/images/ajax-pacMen.gif" style="margin: 17px 100px;"></p>');
				},success: function(data) {
					$arResult1.html(data);
				},});
		} */
	
		$('input[type=submit]').click(function(){
			
			$.ajax({type: "POST",url: "/site/tform/",data: {input: $('#input').val()},beforeSend: function() {
					console.log('load');
				},success: function(data) {
					console.log(data);
				},});
		});
	
	});
</script>

<?php echo CHtml::form();
 
echo CHtml::label('Текст', 'input');
echo CHtml::textArea('input', $input);
 
echo CHtml::label('Результат', 'output');
// name и id для textarea автоматически заданы как 'output'.
echo CHtml::textArea('output', $output);
 
// Второй параметр пуст, значит отсылаем данные на тот же URL.
// Третий параметр задаёт опции запроса. Подробнее с ними можно
// ознакомиться в документации jQuery.
/* echo CHtml::ajaxSubmitButton('Обработать', '', array(
    'type' => 'POST',
    // Результат запроса записываем в элемент, найденный
    // по CSS-селектору #output.
    'update' => '#output',
),
array(
    // Меняем тип элемента на submit, чтобы у пользователей
    // с отключенным JavaScript всё было хорошо.
    'type' => 'submit'
)); */

echo CHtml::ajaxSubmitButton('Обработать', '');
 
echo CHtml::endForm();?>