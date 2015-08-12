<?if($errors):?>
<div class="alert alert-warning">
<?foreach($errors as $error):
	echo '<p>'.$error.'</p>';
endforeach?>
</div>
<?endif?>