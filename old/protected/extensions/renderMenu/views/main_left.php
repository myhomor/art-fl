<?if($items):?>
<ul class="nav" id="main-menu">
<?foreach($items as $item):?>
	 <li>
         <a href="<?=$item['url']?>">
			<i class="fa <?=($item['icon'] ? $item['icon'] : '')?>"></i> 
			<?=$item['label']?>
			<?if($item['items']):?>
				<span class="fa arrow"></span>
			<?endif?>
         </a>
		 <?if($item['items']):?>
		<ul class="nav nav-second-level">
			<?foreach($item['items'] as $item_l2):?>
				<li>
					<a href="<?=$item_l2['url']?>">
					<i class="fa <?=($item_l2['icon'] ? $item_l2['icon'] : '')?>"></i> 
				<?=$item_l2['label']?>
				<?if($item_l2['items']):?>
					<span class="fa arrow"></span>
				<?endif?>
					</a>
					
				<?if($item_l2['items']):?>
					 <ul class="nav nav-third-level">
						<?foreach($item_l2['items'] as $item_l3):?>
							<li><a href="<?=$item_l3['url']?>"><i class="fa <?=($item_l3['icon'] ? $item_l3['icon'] : '')?>"></i> <?=$item_l3['label']?></a></li>
						<?endforeach //l3?>
					 </ul>
				<?endif //if l3?>
				</li>
			
			<?endforeach;//l2?>
         </ul>
		 <?endif//if l2?>
			  
     </li>
<?endforeach//l1?>
</ul>
<?endif//if l1?>