<?
use app\components\menu\WMenu;
use app\components\user\contact\WContact;
use app\components\user\avatar\WAvatar;
?>
<div class='wr-user-bar'>
			<div class='wr-ubar'>
				<?/* =WAvatar::widget([
					'name_temp'=>'profile_main',
					'img_id'=>$user->PERSONAL_AVATAR,
				]) */?>
				<div class='ubar-ico'>
					<img src ='<?=($user->PERSONAL_AVATAR ? $user::getAvatar($user->PERSONAL_AVATAR) : $default_avatar)?>'/>
				</div>
			
				<a href='/user/<?=$user->LOGIN?>'><p class='ubar-name'><?=$user->PERSONAL_NAME?> <?=$user->PERSONAL_LASTNAME?></p></a>
				<p class='ubar-login'><?=$user->LOGIN?></p>
			</div>
			
			<div class='wr-ubar dbord'>
				<?=app\components\user\rating\WRate::widget([
					'template' => 'default',
					'user' => $user
				])?>
			</div>
			<div class='wr-ubar'>
				<?=WMenu::widget([
					'name_menu'=>'us_left_menu',
					'user_id'=>$user->ID,
					'getParams' => ['login' => $user->LOGIN]
				])?>
			</div>
			
			<?if(Yii::$app->user->ID != $user->ID):?>
			<div class='wr-ubar'>
				<a href='#'>
					<button type="button" class="btn btn-success w100">Предложить проект</button>
				</a>
			</div>
			
			<div class='wr-ubar'>
				<a href='#'>
					<button type="button" class="btn btn-primary w100">Личное сообщение</button>
				</a>
			</div>
			<?endif?>
			
			<div class='wr-ubar'>
				<?=WContact::widget([ 
					'name_temp'=>'profile_contact',
					'contact_id'=>$user->ID_CONTACT,
					'user_id' => $user->ID
				])?>
			</div>
</div>