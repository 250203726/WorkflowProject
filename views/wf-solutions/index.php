<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel app\models\WFSolutionsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'SolutionList';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
<!--
-->
.time_infor{
	font-size: 12px;
	color: #999;
	margin-top: 10px;
	clear: both;
	list-style: none;
	text-align:left;
	padding: 0;
}
.single_seaResult{
	color: #333;
	border-bottom: 1px solid #EEE;
	padding-bottom: 10px;
	zoom: 1;
}
.single_seaResult .detail_infor{
	font-size: 12px;
	line-height: 20px;
	padding-top: 8px;
	word-wrap: break-word;
	word-break: normal;
	clear: both;
	list-style: none;
	color: #333;
}
.margr5{
	margin-right:5px;
}
.detail_infor{
	padding-left:0;
	margin-left:0;
}
</style>
<div class="wfsolutions-index">
    <?php echo $this->render('_search', ['model' => $solutionlist]); ?>
	<?php
	foreach ($solutionlist as $value) {
		echo "<div class='single_seaResult fn-clear'><h5><a href='index.php?r=wf-solutions/view&id=".$value['solutionid']."'>".$value['solutionname']."</a></h5>".
		"<ul class=\"time_infor\"><span class=\"glyphicon glyphicon-user margr5\" title=\"作者\"><i></i><font color=\"red\">".
		$value['authorname']."</font></span><span class=\"glyphicon glyphicon-time\" title=\"发布时间\"><i></i>".substr($value['publishtime'],0,10)." 发布</span></ul>".
		"<ul class=\"detail_infor\">简介：".$value['solutiondescription']."</ul></div>";
	}
	
	// 显示分页
	echo LinkPager::widget([
			'pagination' => $pages,
			]);
	?>  
	<div class="alert alert-warning <?php echo (count($solutionlist)>0)?"hidden":"" ?>" role="alert">没有找到对应的数据...</div>
</div>
