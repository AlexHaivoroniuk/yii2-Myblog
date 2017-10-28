<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn', 'visible' => false],

            'id',
            'email:email',
            'username',
            [ 
                'attribute' =>  'active',
                'value' => function($model){
                    if($model->active == 1)
                    {
                        return 'Active';
                    } else {
                        return 'Inactive';
                    }
                }
            ],
            // 'password',

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Actions'
            ],
        ],
    ]); ?>
</div>
