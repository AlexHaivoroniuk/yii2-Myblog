<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 24.10.17
 * Time: 22:23
 */


use yii\widgets\ListView;
use yii\helpers\Url;
use yii\helpers\Html;


?>

<?= ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_list',
    'layout' => "{items}\n{pager}",
//        'summary' => '<div class="right-align">Quantity of Lessons: {totalCount}</div>'
]) ?>
