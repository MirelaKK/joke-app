<?php

namespace app\controllers;

use Yii;
use app\models\Joke;
use app\models\JokeSearch;
use app\models\JokeWithCategory;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class JokeController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index','create','update','view','delete','comment','search'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index','create','update','view','delete','comment','search'],
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Joke models.
     * @return mixed
     */
    public function actionIndex()
    {
        \Yii::$app->language = 'bs-BA';
        $searchModel = new JokeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'view'=>'',
        ]);
    }

    /**
     * Displays a single Joke model.
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
     * Creates a new Joke model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new JokeWithCategory();
        $admin = Yii::$app->user->id;
 
        if ($model->load(Yii::$app->request->post())) {

            if(Yii::$app->request->post('submit')=='dodaj_pregledano_neodobreno') {
                $model->joke_status_id=2;
            } else if(Yii::$app->request->post('submit')=='dodaj_odobreno') {
                $model->joke_status_id=3;
            }
            if ($model->save()) {
                $model->saveCategories();
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'admin' => $admin,
        ]);
    }

    /**
     * Updates an existing Joke model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = JokeWithCategory::findOne($id);
        $model->loadCategories();
        $admin = Yii::$app->user->id;


        if ($model->load(Yii::$app->request->post())) {

            if(Yii::$app->request->post('submit')=='dodaj_pregledano_neodobreno') {
                $model->joke_status_id=2;
            } else if(Yii::$app->request->post('submit')=='dodaj_odobreno') {
                $model->joke_status_id=3;
            }
            if ($model->save()) {
                $model->saveCategories();
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
            'model' => $model,
            'admin' => $admin,
        ]);
    }


    /*
     * Sets the status of model to deleted
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model -> joke_status_id= 5;
        $model->save();
        return $this->redirect(['index']);
    }
    /*
     * Finds next Joke model with unapproved status
     * Redirects to update action
     */
    public function actionLastJoke($id)
    {
        // find last unapproved joke in db
        $lastUnapprovedJoke = Joke::find()->where(['joke_status_id'=>1])->orderBy(['id' => SORT_ASC])->one();
       // checks if there actually are unapproved jokes and if there are
        // checks if the active joke is the last one
        if($this->hasUnapproved() && $lastUnapprovedJoke->id != $id){
           // if not, redirecting to update action with next joke's id
            $model  = Yii::$app->db
                    ->createCommand('SELECT * FROM joke WHERE id < :id AND joke_status_id = :status_id ORDER BY id DESC')
                    ->bindValue(':id', $id)
                    ->bindValue(':status_id', 1)
                    ->queryOne();
             return $this->redirect(['update','id'=>$model['id']]);
        }
      
        return $this->redirect(['index']); 
    }
    public function actionNextJoke($id)
    {
        $nextUnapprovedJoke = Joke::find()->where(['joke_status_id'=>1])->orderBy(['id' => SORT_DESC])->one();
       
        if($this->hasUnapproved() && $nextUnapprovedJoke->id != $id){
            
            $model  = Yii::$app->db
                    ->createCommand('SELECT * FROM joke WHERE id > :id AND joke_status_id = :status_id')
                    ->bindValue(':id', $id)
                    ->bindValue(':status_id', 1)
                    ->queryOne();
             return $this->redirect(['update','id'=>$model['id']]);
        }
      
        return $this->redirect(['index']);   
    }

    /*
     * Redirects to comments which belong to specific Joke model 
     */
    public function actionComment($id)
    {
        return $this->redirect(['joke-comments/index','joke_id'=>$id]);

    }
    /*
     * Renders partialy _search view in index
     * @return mixed
     */
    public function actionSearch(){
        $searchModel = new JokeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $view = $this->renderPartial('_search',['model'=>$searchModel]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'view'=>$view,
        ]);
    }
    /**
     * Finds the Joke model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Joke the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Joke::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function hasUnapproved(){
        
        $status = Joke::find()->where(['joke_status_id'=>1])->all();
        
        return isset($status);
    }
}
