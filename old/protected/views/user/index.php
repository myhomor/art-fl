
<?php
/* @var $this UserController */

$this->breadcrumbs=array(
	'User'=>array('/user'),
	'Login',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<p>
	<?
		if(Yii::app()->user->isGuest) {
			print("Not logged");
			
		} else {
			echo '<pre>';
			print_r(Yii::app()->user);
			echo '</pre>';
			print("Welcome ".Yii::app()->user->name);
			print("Your id is ".Yii::app()->user->id);

		}
	?>

	You may change the content of this page by modifying
	the file <tt><?php echo __FILE__; ?></tt>.
</p>
 