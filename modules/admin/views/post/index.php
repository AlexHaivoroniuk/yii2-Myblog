<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Post', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn' , 'visible' => false],

            'idCategory',
            'title',
            'description',
            // 'post',
            // 'text:ntext',
            // 'video:ntext',
            // 'views',

            [
                
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Actions',
                'template' => '{view}&nbsp;&nbsp;{update}&nbsp;&nbsp;{delete}',
//                'buttons'=> [
//                    'view' => function ($url, $model, $key)
//                    {
//                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>',
//                            ['/admin/post/view', 'id' => $model->id],
//                            [
//                                'class' => 'label btn-success',
//                            ]);
//                    },
//
//                    'update' => function ($url, $model, $key)
//                    {
//                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>',
//                            ['/admin/post/update', 'id' => $model->id],
//                            [
//                                'class' => 'label btn-primary',
//                            ]);
//                    },
//
//                    'delete' => function ($url, $model, $key)
//                    {
//                        return Html::a('<span class="glyphicon glyphicon-trash"></span>',
//                            ['/admin/post/delete', 'id' => $model->id],
//                            [
//                                'class' => 'label btn-danger',
//                            ]);
//                    },
//                ],
            ],
        ],
    ]); ?>
</div>
