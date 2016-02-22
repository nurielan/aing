<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\back\models\LinkSocialSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Link Socials';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="link-social-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!--p>
        <?= Html::a('Create Link Social', ['create'], ['class' => 'btn btn-success']) ?>
    </p-->

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
            'link',
            [
                'class' => 'yii\grid\DataColumn',
                'attribute' => 'status',
                'label' => 'Status (0 Not Active/1 Active)',
                'value' => function($data) {
                    return $data->status == 0 ? 'Not active' : 'Active';
                }
            ],
            //'created_at',
            // 'updated_at',

            [
                'class' => 'yii\grid\ActionColumn',
                'visibleButtons' => [
                    'delete' => false
                ]
            ],
        ],
    ]); ?>

</div>
