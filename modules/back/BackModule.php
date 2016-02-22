<?php

namespace app\modules\back;

use Yii;

class BackModule extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\back\controllers';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
        $this->layout = 'main';
    }

    public function behaviors() {
        return [
            'access' => [
                'class' => 'yii\filters\AccessControl',
                'except' => ['default/login'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['admin']
                    ],
                    [
                        'actions' => ['default/login'],
                        'allow' => true,
                        'roles' => ['?']
                    ],
                    [
                        'actions' => ['default/login'],
                        'allow' => false,
                        'roles' => ['standard']
                    ],
                ],
                'denyCallback' => function($rule, $action) {
                    if (Yii::$app->user->isGuest) {
                        return Yii::$app->response->redirect(['/back/default/login']);
                    } elseif (Yii::$app->user->identity->role == 1) {
                        return Yii::$app->response->redirect(['/site']);
                    }
                }
            ]
        ];
    }
}
