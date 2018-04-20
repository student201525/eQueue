<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Operators */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="operators-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idUser')->textInput() ?>

    <?= $form->field($model, 'idOperatorWindow')->textInput() ?>

    <?= $form->field($model, 'beginWork')->textInput() ?>

    <?= $form->field($model, 'endWork')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
