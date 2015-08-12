
<ul class="sidebar-menu">
     <li class="header">MAIN NAVIGATION</li>
	<?foreach($items as $item):?>
	 <li class="treeview">
         <a href="<?=$item['url']?>">
			<i class="fa <?=($item['icon'] ? $item['icon'] : '')?>"></i> 
			<span><?=$item['label']?></span> 
			<?if($item['items']):?>
				<i class="fa fa-angle-left pull-right"></i>
			<?endif?>
         </a>
		 <?if($item['items']):?>
		<ul class="treeview-menu">
			<?foreach($item['items'] as $item_l2):?>
				<li>
					<a href="<?=$item_l2['url']?>"><i class="fa <?=($item_l2['icon'] ? $item_l2['icon'] : '')?>"></i> 
				<?=$item_l2['label']?>
				<?if($item_l2['items']):?>
					<i class="fa fa-angle-left pull-right"></i>
				<?endif?>
					</a>
					
				<?if($item_l2['items']):?>
					 <ul class="treeview-menu">
						<?foreach($item_l2['items'] as $item_l3):?>
							<li><a href="<?=$item_l3['url']?>"><i class="fa <?=($item_l3['icon'] ? $item_l3['icon'] : '')?>"></i> <?=$item_l3['label']?></a></li>
						<?endforeach?>
					 </ul>
				<?endif?>
				</li>
			
			<?endforeach;//l2?>
         </ul>
		 <?endif?>
			  
     </li>
	 <?endforeach?>
</ul>