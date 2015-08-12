<?
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Сервисы';
$this->params['breadcrumbs'][] = ['label' => $user->LOGIN, 'url' => ['/user/']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class='row'>
	<div class='col-md-3'>
		<div class='wr-cont-box'>
			<?=\app\components\menu\WMenu::widget([
				'name_menu' => 'settings_user',
				'name_temp' => 'us_left_menu',
				'user_id'=>$user->ID,
			])?>
			
			<?=\app\components\menu\WMenu::widget([
				'name_menu' => 'settings_service_user',
				'name_temp' => 'us_left_menu',
				'user_id'=>$user->ID,
			]) ?>
		</div>
	</div>	
	<div class='col-md-9'>
		<div class='wr-cont-box'>
			<div class='wr-box'>
			<?if($model){?>
			<table class="table table-hover table-striped">
			  <thead>
				<tr>
				  <th>#</th>
				  <th></th>
				  <th>Статус</th>
				  <th>Название</th>
				  <th>Дата создания</th>
				  <th>Дата редактирования</th>
				</tr>
			  </thead>
			  <tbody>
				<?$inc=1;
				foreach($model as $item)
				{
					echo '<tr>';
					echo '<th>'.$inc++.'</th>';
					echo '<td>
					<div class="btn-group">
						<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
							<span class="glyphicon glyphicon-align-justify"></span>
						</button>
					  <ul class="dropdown-menu" role="menu">
						<li>
							<a href="'.Url::to(['', '_a'=>'detail','_id'=>$item->ID]).'">Открыть</a>
						</li>
						<!--<li>
							<a href="#">'.($item->ACTIVE == "Y" ? "Деактивировать" : "Активировать").'</a>
						</li>
						-->
						<li>
							<a href="'. Url::to(['','_a' => 'delete', '_id' => $item->ID]).'"> Удалить</a>
						</li>
					  </ul>
					</div>
					
					
					</td>';
					echo '<td class="text-center">
					<span class="glyphicon glyphicon-'.($item->ACTIVE == "Y" ? "ok text-success" : "remove text-danger") .'"></span>
					</td>';
					echo '<td>'.$item->NAME .'</td>';
					echo '<td>'.$item->DATE_CREATE .'</td>';
					echo '<td>'.$item->DATE_LAST_CHANGE .'</td>';
					echo '</tr>';
				}			
				?>
			  </tbody>
			</table>
			<?}else{?>
				<div class='bs-callout bs-callout-warning'>
					<h4>Список услуг пока пуст :(</h4>
					<p>Типовые услуги - это ваш прайс лист по стандартно предоставляемым услугам с раценками, описанием и подробными примерами. Добавить их моджно <a href='<?=Url::to(['','_a' => 'add'])?>'>по ссылке</p>
				</div>
			<?}?>
			</div>
			<div class='wr-box'>
			<?= \yii\widgets\LinkPager::widget([
				'pagination' => $pages,
			]);
			?>
			</div>
			<?/* $form = ActiveForm::begin(['id' => 'userUpdate', 'options' => ['enctype' => 'multipart/form-data']]); ?>

			<?=$form->field($model, 'email')->input('text', ['value' => ($post['email'] ? $post['email'] : $contact->PERSONAL_MAIL)])?>
			<?=$form->field($model, 'phone')->input('text', ['value' => $contact->PERSONAL_PHONE])?>
			<?=$form->field($model, 'site')->input('text', ['value' => $contact->PERSONAL_SITE])?>
            <?=$form->field($model, 'skype')->input('text', ['value' => $contact->PERSONAL_SKYPE])?>
            <?=$form->field($model, 'icq')->input('text', ['value' => $contact->PERSONAL_ICQ])?>
            <?=$form->field($model, 'vk')->input('text', ['value' => $contact->PERSONAL_VK])?>
            <?=$form->field($model, 'fb')->input('text', ['value' => $contact->PERSONAL_FB])?>
           
		
            <div class="form-group">
                <?=Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
            </div>
            <?ActiveForm::end();  */?>
		</div>
	</div>
</div>