<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use newerton\fancybox\FancyBox;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\BookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Books';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Book', ['create'], ['class' => 'btn btn-success']) ?>
    </p>



<!--    <h1>--><?//= Html::button('View Books',['value' => Url::to('/admin/book/view?id='.$searchModel->id), 'class' => 'btn btn-success', 'id' => 'modalButton']) ?><!--</h1>-->

    <?php Modal::begin([
        'header' => '<h1>Books</h1>',
        'id' => 'modal',
        'size' => 'modal-lg'
    ]);

    echo "<div id='modalContent'></div>";

    Modal::end();
    ?>





<?php Pjax::begin(); ?> <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
            'showOnEmpty' => false,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn', 'visible' => false ],

            'id',
            'name:ntext',

             [ 'attribute' =>  'image',
                 'format' => 'html',
               'value' => function($data){
                   $img = $data->getImage();
                   return Html::img($img->getUrl('200x200'),['class' => 'lightbox_trigger']);
//                   echo Html::img($img->getUrl('200x200'));
               }
             ],
             'author:ntext',
            'release_date',
            'attachment_date',

//            [
//                'class' => 'yii\grid\ActionColumn',
//                'header' => 'Actions',
//                'buttons' => [
//                        'view' => function ($url,$model, $key) {
//                            var_dump($key);
//                            return Html::a(
//
//                                '<button id="modalButton"><span class="glyphicon glyphicon-eye-open"></span></button>',
//                                Url::to(['/admin/book/view?id=' . $key]));
//                        }
//                ],
//            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Actions',
                'buttons' => [
                    'view' => function ($url,$model, $key) {
                        var_dump($key);
                        var_dump($url);
                        var_dump(is_array($key));
                            return Html::button('', ['value' => Url::to($url), 'class' => ' glyphicon glyphicon-eye-open modalButton'/*, 'id' => 'modalButton'*/]);



//                            Html::button(['item' => function(){
//                            return Html::tag('span', ['class' => 'glyphicon glyphicon-eye-open']);
//                        }], ['id' => 'modalButton']);

//                            '<button id="modalButton"><span class="glyphicon glyphicon-eye-open"></span></button>',
//                            Url::to(['/admin/book/view?id=' . $key]));
                    },

//                    'update' => function ($url,$model, $key) {
//                        return Html::a('', ['/admin/book/update', 'id' => $model->id],[ 'class' => 'btn btn-primary glyphicon glyphicon-pencil' ]);
//                    },
//
//                    'delete' => function ($url,$model, $key) {
//                        return Html::button('',['/admin/book/delete', 'id' => $model->id, 'method' => 'POST'], [ 'class' => 'btn    glyphicon glyphicon-trash' ]);
//                    },




                ],
            ],


//            [ 'attribute' =>  'View',
//                'format' => 'html',
//                'value' => function($date){
//                    return
//                }
//            ],
        ],
    ]);
    ?>

    
<?php Pjax::end(); ?></div>
