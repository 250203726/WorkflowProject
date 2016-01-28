<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>
<div class="post">  
    <strong><a href="index.php?r=wf-solutions/view&id=<?= $model->solutionid ?>"><?= Html::encode($model->solutionname) ?></a></strong>  <br/>
    <?= HtmlPurifier::process($model->solutiondescription) ?> </a>     
</div>  