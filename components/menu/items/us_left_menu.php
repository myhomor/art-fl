<?
return array(
	array(
		'label' => 'Портфолио',
		'url' => '/user/default/portfolio',
		'visible' => 'public',
		'getParams' => ['login'],
	),
	array(
		'label' => 'Типовые услуги',
		'url' => '/user/default/service',
		'visible' => 'public',
		'getParams' => ['login'],
	),
	array(
		'label' => 'Отзывы',
		'url' => '/user/default/review',
		'visible' => 'public',
		'getParams' => ['login'],
	),
	array(
		'label' => 'Настройка профиля',
		'url' => '/user/settings/index',
		'visible' => 'private',
	)
); 