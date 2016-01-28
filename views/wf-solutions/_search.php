<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\WFSolutionsSearch */
/* @var $form yii\widgets\ActiveForm */
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

</style>
<div class="wfsolutions-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row paddingb25">
    <div class="col-lg-2"></div>
	  <div class="col-lg-8">
	    <div class="input-group">
	      <div class="input-group-btn">
	        <button type="button" class="btn btn-default dropdown-toggle"  id="input-group-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" value="">标题   <span class="caret"></span></button>
	        <ul class="dropdown-menu">	          
	          <li><a href="#" value="authorname">作者</a></li>
	          <li><a href="#" value="solutionflag">标签</a></li>
	          <li role="separator" class="divider"></li>
	          <li><a href="#" value="solutionname">标题 </a></li>
	          <li class="hidden"><a href="#" value="fulltext">全文检索</a></li>
	        </ul>
	      </div><!-- /btn-group -->
	      <input type="text" class="form-control" name="WFSolutions[solutionname]" id="searchType" aria-label="Search"  placeholder="Search for...">
	    </div><!-- /input-group -->
	  </div><!-- /.col-lg-6 -->
	  <div class="col-lg-2">
	   	<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
	  </div>
  </div>
    <?php ActiveForm::end(); ?>
</div>
<?= Html::jsFile('@web/assets/6008320f/jquery.js') ?>
<?= Html::jsFile('@web/js/project.js') ?>