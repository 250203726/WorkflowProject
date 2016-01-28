<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MyCheckList */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="my-check-list-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'problemgroupid')->textInput() ?>
    
    <?= $form->field($model, 'problemname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'problemgroupname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'problemdescribe')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'problempriority')->textInput() ?>

    <?= $form->field($model, 'problemkindid')->textInput() ?>

    <?= $form->field($model, 'problemkindname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reasons')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'solution')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
