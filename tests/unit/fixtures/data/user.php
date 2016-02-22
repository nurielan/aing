<?php

return [
	[
		'username' => 'admingbs',
		'email' => 'admin@gangstownbarbershop.com',
		'password' => \Yii::$app->getSecurity()->generatePasswordHash('kotak'),
		'authKey' => \Yii::$app->getSecurity()->generateRandomString(),
		'role' => 0,
		'created_at' => date('Y-m-d')
	],
	[
		'username' => 'deadpool',
		'email' => 'deadpool@marvel.com',
		'password' => \Yii::$app->getSecurity()->generatePasswordHash('deadpool'),
		'authKey' => \Yii::$app->getSecurity()->generateRandomString(),
		'created_at' => date('Y-m-d')
	]
];