<?php

namespace app\controllers;

use Yii;
use app\models\WFSolutions;
use app\models\WFSolutionsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\base\Exception;
use \yii\data\Pagination;

/**
 * WFSolutionsController implements the CRUD actions for WFSolutions model.
 */
class WfSolutionsController extends Controller
{
	public $enableCsrfValidation = false;
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all WFSolutions models.
     * @return mixed
     */
    public function actionIndex()
    {
    	$model = new WFSolutions();
    	$query=$model->search(Yii::$app->request->queryParams);//WFSolutions::find();
    	$countQuery = clone $query;
    	
    	$pages = new Pagination(['totalCount' => $countQuery->count(),'pagesize'=>5,]);
    	$models = $query->orderBy("publishtime desc")
    					->offset($pages->offset)
				    	->limit($pages->limit)
				    	->all();
    	return $this->render('index', ['solutionlist' => $models,'pages' =>$pages]);
    }

    /**
     * Displays a single WFSolutions model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
    	$op=Yii::$app->request->get('op');
    	if ($op!=null) {	
    		$model=($op=="pre")?$this->findPre($id):$this->findNext($id);
    		$CP=($model==null)?($op=="pre"?-1:1):0;    		
    	}else{
    		$model=$this->findModel($id);
    		$CP=0;
    	}
    	
    	if ($model==null) {
    		$model=$this->findModel($id);
    	}
        return $this->render('view', [
            'model' => $model,
        	'currentPosition'=>$CP,
        ]);
    }

    /**
     * Creates a new WFSolutions model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new WFSolutions();
		
        if ($model->load(Yii::$app->request->post())) {
        	$model->publishtime=date("Y-m-d H:i:s",time());
        	$model->authorid="1";
        	$model->authorname="wonder888";
        	$model->ispublish=1;
        	if ($model->save()) {
        		return $this->redirect(['view', 'id' => $model->solutionid]);;
        	}                    
        } 
        
            return $this->render('create', [
                'model' => $model,
            ]);
    }

    /**
     * Updates an existing WFSolutions model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->solutionid]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing WFSolutions model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the WFSolutions model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return WFSolutions the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = WFSolutions::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
     * Finds the WFSolutions model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return WFSolutions the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findPre($id)
    {
    	$row = (new \yii\db\Query())
    	->from('tb_solutions')
    	->where(['<', 'solutionid', $id])
    	->orderBy('solutionid DESC')
    	->LIMIT("1")
    	->OFFSET("0")
    	->one();
    	if (($model = WFSolutions::findOne($row['solutionid'])) !== null) {
    		return $model;
    	} else {
    		return null;
    	}
    }
    
    /**
     * Finds the WFSolutions model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return WFSolutions the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findNext($id)
    {
    	$row = (new \yii\db\Query())
    	->from('tb_solutions')
    	->where(['>', 'solutionid', $id])
    	->orderBy('solutionid asc')
    	->LIMIT("1")
    	->OFFSET("0")
    	->one();
    	if (($model = WFSolutions::findOne($row['solutionid'])) !== null) {
    		return $model;
    	} else {
    		return null;
    	}
    }
    
    public function actionNew()
    {
    
    	for ($i=0;$i<30;$i++)
    	{
    	$taskInfo=new WFSolutions();
    	 
    	$taskInfo->solutionname="标题-".$i;
    	$taskInfo->solutiondescription="描述-".$i;
    	$taskInfo->solutioncontent="内容---".$i;
    	$taskInfo->solutionflag="标签，标签".$i;
    	$taskInfo->authorid=$i;
    	$taskInfo->authorname="wonder4-".$i;
    	$taskInfo->publishtime=date("y-m-d h:i:s",time());
    	$taskInfo->ispublish=($i%2==0)?1:0;
    	try {
    		$re=$taskInfo->insert();//插入数据e
    	} catch (Exception $e) {
    	var_dump($e->getMessage());
    	}
    
    	echo "插入第".$i."条".($re==true?"::成功":"::失败")."<br>";
    	}
    	 
    	}
    	
    	public function actionTime()
    	{
    		echo date("Y-m-d H:i:s",time());
    	}
    	
    	
}
