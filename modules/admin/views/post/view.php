<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Post */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'image',
                'value' => function($data)
                {
                    $img = $data->getImage();
                    return Html::img($img->getUrl('200x100'));
                },
                'format' => 'html'
            ],
            [
                'attribute' => 'idCategory',
                'value' => function ($data)
                {
                    return $data->category->title;
                },
            ],
            'title',
            'keywords',
            'description',
            'post',
            'text:ntext',
            'video:ntext',
            'views',
        ],
    ]) ?>

</div>
