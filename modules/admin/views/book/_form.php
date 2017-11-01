<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use yii\helpers\Url;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Book */
/* @var $form yii\widgets\ActiveForm */
?>

<?php Pjax::begin();?>
<div class="book-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput() ?>

    <?= $form->field($model, 'image')->fileInput() ?>

    <?= $form->field($model, 'author')->textInput() ?>

    <?=
     $form->field($model, 'release_date')->widget(DatePicker::classname(),[
        'language' => 'en',
        'dateFormat' => 'yyyy/MM/dd',
    ]) ?>

    <?=
     $form->field($model, 'attachment_date')->widget(DatePicker::classname(),[
        'language' => 'en',
        'dateFormat' => 'yyyy/MM/dd',
    ])

    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
<?php Pjax::end();?>
