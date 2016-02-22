<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\back\models\HomeImage */

$this->title = 'Update Home Image: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Home Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="home-image-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
