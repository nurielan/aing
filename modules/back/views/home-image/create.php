<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\back\models\HomeImage */

$this->title = 'Create Home Image';
$this->params['breadcrumbs'][] = ['label' => 'Home Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="home-image-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
