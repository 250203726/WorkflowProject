<?php

namespace app\controllers;

use Yii;
use app\models\MyCheckList;
use app\models\CheckListSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\base\Exception;
/**
 * CheckListController implements the CRUD actions for MyCheckList model.
 */
class CheckListController extends Controller
{
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
     * Lists all MyCheckList models.
     * @return mixed
     */
    public function actionIndex()
    {
    	$model = new MyCheckList();
    	$searchModel = new CheckListSearch();
    	
    	$dataProvider = new ActiveDataProvider([
    			'query' => $model->find(),
    			'pagination' => [
    			'pagesize' => '8',
    			]
    			]);
    	return $this->render('index', [ 'searchModel' => $searchModel,'model' => $model, 'dataProvider' => $dataProvider]);
    }

    /**
     * Displays a single MyCheckList model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new MyCheckList model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MyCheckList();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->problemid]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing MyCheckList model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->problemid]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing MyCheckList model.
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
     * Finds the MyCheckList model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MyCheckList the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MyCheckList::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    
    public function actionNew()
    {
    	 
    	for ($i=0;$i<30;$i++)
    	{
    	$taskInfo=new MyCheckList();
    	
    	$taskInfo->problemid=$i;
    	$taskInfo->problemname="任务名称-".$i;
    	$taskInfo->problemgroupid=$i;
    	$taskInfo->problemgroupname="problemgroupname".$i;
    	$taskInfo->problemdescribe="203.".$i;
    	$taskInfo->problempriority="1";
    	$taskInfo->problemkindid=$i;
    	$taskInfo->problemkindname="所属分类".$i;
    	$taskInfo->reasons="产生原因如下：".$i;
    	$taskInfo->solution="解决方案：".$i;
    	try {
    	$re=$taskInfo->insert();//插入数据e
    	} catch (Exception $e) {
    	var_dump($e->getMessage());
    }
    
    echo "插入第".$i."条".($re==true?"::成功":"::失败")."<br>";
    }
    		 
    }
}
