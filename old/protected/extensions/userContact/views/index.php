<pre><?//print_r($arResult)?></pre>

<?if(Yii::app()->user->ID == $arResult['u_id'])
{
if(count($arResult['content'])):?>
	<p>Контактной информации пока нет.</p>
	<div style='text-align:center;'>
		<?=CHtml::link('Добавить', '/user/settings', array('class'=>''))?>
	</div>
<?endif?>	
	
<?}
else
{
	if(count($arResult['content'])):?>
	<p>Контактной информации пока нет.</p>
<?endif;
}?>