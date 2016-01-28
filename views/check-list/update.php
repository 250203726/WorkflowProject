<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MyCheckList */

$this->title = 'Update My Check List: ' . ' ' . $model->problemid;
$this->params['breadcrumbs'][] = ['label' => 'My Check Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->problemid, 'url' => ['view', 'id' => $model->problemid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="my-check-list-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
