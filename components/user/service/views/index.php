<?if($services){?>
<style>
.box-ico{
	position:relative;	
}
.box-ico img{width:100%}

.box-price{
	position: absolute;
	bottom: 0px;
	padding: 10px;
	display: inline-block;
	background: rgba(44, 43, 43, 0.59);
	color: #fff
}
</style>
<div class=''>
	
	<h3><?=$label?></h3>
	
	<?foreach($services as $service){?>
	<div class="col-sm-6 col-md-4">
		<div class="thumbnail">
			<div class='box-ico'>
				<img src="http://placehold.it/320x300/E0E4CC/ffffff" >
				<div class='box-price'><?=$service->PRICE?> р</div>
			</div>
			<div class="caption">
				<h4><?=$service->NAME?></h4>
				<p><a href="<?=\yii\helpers\Url::toRoute(['/user/default/service/', 'login'=>$login,'_id'=>$service->ID])?>" class="btn btn-primary" role="button">Подробнее</a></p>
			</div>
		</div>
	</div>
	<?}?>
	
</div>

<?}?>