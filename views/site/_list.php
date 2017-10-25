<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 24.10.17
 * Time: 21:25
 */


use yii\helpers\Html;


?>

    <article class="box post post-excerpt">
        <header>

            <h2><a href="#"><?= $model->title ?></a></h2>
            <p>A free, fully responsive HTML5 site template by HTML5 UP</p>
        </header>
        <div class="info">
            <!--
Note: The date should be formatted exactly as it's shown below. In particular, the
                "least significant" characters of the month should be encapsulated in a <span>
                element to denote what gets dropped in 1200px mode (eg. the "uary" in "January").
                Oh, and if you don't need a date for a particular page or post you can simply delete
                the entire "date" element.

-->
            <span class="date">
<!--                <span class="month">-->
<!--                    scrip-->
<!--                    <span>y</span>-->
<!--                </span> -->
                <span class="day"><?= $model->post ?>
                </span>
                <span class="year">, 2014</span>
            </span>
            <!--
Note: You can change the number of list items in "stats" to whatever you want.
-->
            <ul class="stats">
                <li><a href="#" class="icon fa-eye"><?= $model->views ?></a></li>

        </div>

        <?php $img = $model->getImage(); ?>
        <?= Html::img($img->getUrl('1038x584'), ['alt' => 'My logo']) ?>

<!--        <a href="#" class="image featured"><img src="images/pic01.jpg" alt="" /></a>-->
        <p><?= $model->text ?> </p>
    </article>