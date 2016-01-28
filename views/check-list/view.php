<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MyCheckList */

$this->title = $model->problemid;
$this->params['breadcrumbs'][] = ['label' => '问题清单', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="my-check-list-view">
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->problemid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->problemid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'problemid',
            'problemgroupid',
            'problemgroupname',
            'problemdescribe',
            'problempriority',
            'problemkindid',
            'problemkindname',
            'reasons:ntext',
            'solution:ntext',
        ],
    ]) ?>

</div>
