<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\WFSolutions */

$this->title = $model->solutionname;
$this->params['breadcrumbs'][] = ['label' => 'SolutionList', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
.marginb25{
	margin-bottom:25px;
}
.paddingb25{
	padding-bottom:25px;
}
.marginl25{
	margin-left:25px;
}

.borderb1{
	border-bottom:1px solid #d1d1d1;
}
.time_infor{
	padding-left:0;
	font-size:12px;
}
.margr5{
	margin-right:5px;
}
.divcontent{
	min-height:400px;
}
.page-header h1{
	margin-left:15px;
}
</style>
<?= Html::jsFile('@web/ueditor/ueditor.parse.js') ?>
<div class="wfsolutions-view">
	<div class="page-header">
	  <h1><?= Html::encode($model->solutionname) ?></h1>
	</div>
	<ul class="time_infor">
		<span class="glyphicon glyphicon-user margr5" title="作者"><?= Html::encode($model->authorname) ?></span>
		<span class="glyphicon glyphicon-time" title="发布时间"><?= Html::encode($model->publishtime) ?> 发布</span>
	</ul>
	<div class="divcontent">
		<?= Html::decode($model->solutioncontent) ?>
	</div>
	<nav>
	  <ul class="pager">
	    <li class="previous <?php echo ($currentPosition==-1)?"hidden":"" ?>">
	    <a href="index.php?r=wf-solutions/view&op=pre&id=<?= Html::encode($model->solutionid) ?>">
	    <span aria-hidden="true">&larr;</span> 上一篇</a></li>
	    <li class="next <?php echo ($currentPosition=="1")?"hidden":"" ?>">
	    <a href="index.php?r=wf-solutions/view&op=next&id=<?= Html::encode($model->solutionid) ?>">下一篇 <span aria-hidden="true">&rarr;</span></a></li>
	  </ul>
	</nav>
</div>
