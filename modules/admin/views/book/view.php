<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Book */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>



<div class="book-view">
    


    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php /*Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary'])*/ ?>
        <?php/* Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) */ ?>
    </p>


    <h1><?php /*Html::button('View Books',['value' => Url::to('/admin/book/view?id='.$model->id), 'class' => 'btn btn-success', 'id' => 'modalButton'])*/ ?></h1>

    <?php Modal::begin([
        'header' => '<h1>Books</h1>',
        'id' => 'modal',
        'size' => 'modal-lg'
    ]);



    echo "<div id='modalContent'></div>";

    Modal::end();
    ?>



    <?php Pjax::begin();?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name:ntext',
            [
                'attribute' => 'image',
                'format' => 'html',
                'value' => function($data)
                {
                    $img = $data->getImage();
                    return  Html::img($img->getUrl('200x300'), ['id' => 'myImg']);
                },

            ],
            'author:ntext',
            'release_date',
            'attachment_date',
        ],

    ]);

    ?>
    <?php Pjax::end();?>
</div>





