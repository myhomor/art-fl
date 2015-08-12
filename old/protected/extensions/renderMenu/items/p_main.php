<?
return array(
	array(
		'label' => 'Портфолио',
		'url' => '/user/default/portfolio',
		/* 'ajax' => array(
			'type' => 'POST',
			'beforeSend' => 'function() {$("#prof-content").html("loading");}',
			'success' => 'function(data) {$("#prof-content").html(data);}',
			), */
		'visible' => 'public',
	),
	array(
		'label' => 'Типовые услуги',
		'url' => '/user/default/service',
		/* 'ajax' => array(
			'type' => 'POST',
			'beforeSend' => 'function() {$("#prof-content").html("loading");}',
			'success' => 'function(data) {$("#prof-content").html(data);}',
			), */
		'visible' => 'public',
	),
	array(
		'label' => 'Отзывы',
		'url' => '/user/default/review',
		'ajax' => array(
			'type' => 'POST',
			'beforeSend' => 'function() {$("#prof-content").html("loading");}',
			'success' => 'function(data) {$("#prof-content").html(data);}',
			), 
		'visible' => 'public',
	),
	array(
		'label' => 'Настройка профиля',
		'url' => '/user/settings/index',
		'createUrl' => 'N',
		'visible' => 'private',
	)
);