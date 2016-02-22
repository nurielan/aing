<?php

namespace app\commands;

use Yii;

class RbacController extends \yii\console\Controller {

	public function actionInit() {
		$auth = Yii::$app->authManager;
		$auth->removeAll();

		$rule = new \app\rbac\UserRoleRule;
		$auth->add($rule);

		$standard = $auth->createRole('standard');
		$standard->ruleName = $rule->name;
		$auth->add($standard);

		$admin = $auth->createRole('admin');
		$admin->ruleName = $rule->name;
		$auth->add($admin);
		$auth->addChild($admin, $standard);
	}
}