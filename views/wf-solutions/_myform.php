<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\WFSolutions */
/* @var $form yii\widgets\ActiveForm */
?>
	<?= Html::jsFile('@web/ueditor/ueditor.config.js') ?>
	<?= Html::jsFile('@web/ueditor/ueditor.all.js') ?>
	
 	<!-- 实例化编辑器 -->
 	<?= Html::script("var ue = UE.getEditor('solutioncontent');", ['type' => 'text/javascript'])?>
<div class="wfsolutions-form">
<div class="row">
	<div class="col-lg-10">
	    
	    <?php $form = ActiveForm::begin([
		    'id' => 'WFSolutions',
		    'options' => ['class' => 'form-horizontal'],
		]) ?>
		  <div class="form-group">
		    <label for="solutionname" class="col-sm-2 control-label">标题</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="solutionname" name="WFSolutions[solutionname]" placeholder="标题">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="solutiondescription" class="col-sm-2 control-label">简介</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="solutiondescription" name="WFSolutions[solutiondescription]" placeholder="简介">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="solutioncontent" class="col-sm-2 control-label">内容</label>
		    <div class="col-sm-10">
		    	<?= Html::script("", ['id' => 'solutioncontent','name'=>'WFSolutions[solutioncontent]','type'=>'text/plain'])?>
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="solutionflag" class="col-sm-2 control-label">标签</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="solutionflag" name="WFSolutions[solutionflag]" placeholder="标签">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="ispublish" class="col-sm-2 control-label">是否发布</label>
		      <div class="col-sm-10" style="padding-top: 7px;">
		      	<input type="checkbox" id="ispublish" name="WFSolutions[ispublish1]">
		      </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		    </div>
		  </div>
		<?php ActiveForm::end() ?>
   </div>
   <div class="col-lg-1"></div>
</div>
</div>
