<?if($items):?>
<ul class='user-settings-nav'>
<!--class='action'-->
	<?foreach($items as $item):?>
		<li><a href='<?=$item['url']?>'/><?=$item['label']?></a></li>
	<?endforeach?>
</ul>
<?endif?>