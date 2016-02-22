<?php

namespace app\rbac;

use Yii;

class UserRoleRule extends \yii\rbac\Rule {

	public $name = 'userRole';

	public function execute($user, $item, $params) {
		if (!Yii::$app->user->isGuest) {
			$role = Yii::$app->user->identity->role;

			if ($item->name = 'admin') {
				return $role == 0;
			} elseif ($item->name == 'standard') {
				return $role == 1;
			}
		}

		return false;
	}
}