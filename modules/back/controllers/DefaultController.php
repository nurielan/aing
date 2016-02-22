<?php

namespace app\modules\back\controllers;

use yii\web\Controller;
use Yii;

class DefaultController extends Controller
{
	public function behaviors() {
		return [
            'verbs' => [
				'class' => 'yii\filters\VerbFilter',
				'actions' => [
					'logout' => ['post']
				]
			]
		];
	}

	public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

	public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goBack(['/back/default/index']);
        }

        $model = new \app\modules\back\models\LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack(['/back/default/index']);
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect(['/back/default/login']);
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
}
