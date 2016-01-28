<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MyCheckList */

$this->title = '新增问题';
$this->params['breadcrumbs'][] = ['label' => '问题清单', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="my-check-list-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
