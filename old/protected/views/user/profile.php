<?php
/* @var $this UserController */

$this->breadcrumbs=array(
	'User'=>array('/user'),
	'Login',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<p>
	You may change the content of this page by modifying
	the file <tt><?php echo __FILE__; ?></tt>.
</p>
<?//=Yii::app()->user->isGuest?>
http://yiiframework.ru/doc/guide/ru/topics.auth
<?
if(Yii::app()->user->checkAccess('administrator'))
    echo "hello, I'm administrator";
else
	echo 'GOGGGGII';

$role = Yii::app()->user->getRole();

echo $role;
//echo Yii::app()->user->ID;
//UGetDate::pArray($role->ID_ROLE);

$link= Yii::app()->db->createCommand()
    ->select('CODE')
    ->from('core_users_role')
    ->where('ID=:id', array(':id'=>1))
    ->queryRow();

UGetDate::pArray($link);

echo Yii::app()->user->getRole(); 
?>

