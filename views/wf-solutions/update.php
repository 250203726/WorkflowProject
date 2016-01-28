<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\WFSolutions */

$this->title = 'Update Wfsolutions: ' . ' ' . $model->solutionid;
$this->params['breadcrumbs'][] = ['label' => 'Wfsolutions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->solutionid, 'url' => ['view', 'id' => $model->solutionid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="wfsolutions-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
