<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MyCheckListSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'CheckList';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="my-check-list-index">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'problemid',
    		'problemname',
            'problemdescribe',
			[
			'attribute' => 'problempriority',
			'label'=>'优先级',
			'value'=>
			function($model){
				switch ($model->problempriority){
				case "1":
					$returnVale="低";
				break;
				case "2":
					$returnVale="中";
					break;
				case "3":
					$returnVale="高";
					break;
				default:
					$returnVale="未知";
    			}
					
				return $returnVale;
			},
			],

            [
            'class' => 'yii\grid\ActionColumn', 
            'header' => '<span>操作</span>', 
            'template' => '{view} {update} {delete} {audit}',
			'buttons' => [
			'audit' => function ($url, $model, $key) {
			     return Html::a('<span class="glyphicon glyphicon-user"></span>', 
								$url, 
								['title' => '标记','data-confirm'=>'sure?'] ); 
			                 },
			                 ],
			 'headerOptions' => ['width' => '100']
            ],           
            ],           
    ]); ?>
    
    <p>
        <?= Html::a('New', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Export', ['Ext/Excel'], ['class' => 'btn btn-primary']) ?>
    </p>
</div>
