<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\WFSolutions */

$this->title = 'Create Solution';
$this->params['breadcrumbs'][] = ['label' => 'SolutionList', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wfsolutions-create">
    <?= $this->render('_myform', [
        'model' => $model,
    ]) ?>

</div>
