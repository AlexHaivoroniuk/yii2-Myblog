<?php

/* @var $this yii\web\View */

$this->title = 'Mi yii application';

use yii\widgets\ListView;
use yii\helpers\Url;
use yii\helpers\Html;

?>

<div class="inner">


    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_list',
        'layout' => "{items}\n{pager}",
//        'summary' => '<div class="right-align">Quantity of Lessons: {totalCount}</div>'
    ]) ?>


<!--    <!-- Pagination -->-->
<!--    <div class="pagination">-->
<!--        <!--<a href="#" class="button previous">Previous Page</a>-->-->
<!--        <div class="pages">-->
<!--            <a href="#" class="active">1</a>-->
<!--            <a href="#">2</a>-->
<!--            <a href="#">3</a>-->
<!--            <a href="#">4</a>-->
<!--            <span>&hellip;</span>-->
<!--            <a href="#">20</a>-->
<!--        </div>-->
<!--        <a href="#" class="button next">Next Page</a>-->
<!--    </div>-->

</div>