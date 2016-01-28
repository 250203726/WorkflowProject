<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\WFSolutions */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wfsolutions-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'solutionname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'solutiondescription')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'solutioncontent')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'solutionflag')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'authorid')->textInput() ?>

    <?= $form->field($model, 'authorname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'publishtime')->textInput() ?>

    <?= $form->field($model, 'ispublish')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
