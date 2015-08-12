<div class="row">
	<div class="col-md-3 col-sm-6 col-xs-12">
		<div class="info-box">
			HELLO
			
			<?
if(Yii::app()->user->checkAccess('administrator'))
    echo "hello, I'm administrator";
else
	echo 'GOGGGGII';
			?>
			<h1><?php echo $this->uniqueId . '/' . $this->action->id; ?></h1>
		</div><!-- /.info-box -->
	</div><!-- /.col --> 
</div>