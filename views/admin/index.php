<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заказы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>

<!--    <p>-->
<!--        --><?//= Html::a('Create Order', ['create'], ['class' => 'btn btn-success']) ?>
<!--    </p>-->


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'date',
            'name',
            'email:email',
            'phone',
            'address',
            'sum',

            [
                'attribute' => 'status',
                'value' => function($info)
                {
                  return $info->status == 'Завершен' ? '<span style="color:green;">' . $info->status . '</span>' : '<span style="color:red;">' . $info->status . '</span>';
                },
                'format' => 'raw'
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
