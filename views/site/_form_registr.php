<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form ActiveForm */
?>
<div class="site-_form_registr">

    <?php $form = ActiveForm::begin([
            'id' => 'registr',
            'enableAjaxValidation' => true,
    ]); ?>

        <?= $form->field($model, 'email')->textInput(); ?>
        <?= $form->field($model, 'username')->textInput(); ?>
        <?= $form->field($model, 'password')->textInput(['type' => 'password']); ?>

    
        <div class="form-group">
            <?= Html::submitButton('Зарегистрироватся', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-_form_registr -->
