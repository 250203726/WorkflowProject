<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MyCheckListSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="my-check-list-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'problemid') ?>

    <?= $form->field($model, 'problemgroupid') ?>

    <?= $form->field($model, 'problemgroupname') ?>

    <?= $form->field($model, 'problemdescribe') ?>

    <?= $form->field($model, 'problempriority') ?>

    <?php // echo $form->field($model, 'problemkindid') ?>

    <?php // echo $form->field($model, 'problemkindname') ?>

    <?php // echo $form->field($model, 'reasons') ?>

    <?php // echo $form->field($model, 'solution') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
