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
 
        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                $model->saveCategories();
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
            'model' => $model,
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

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                $model->saveCategories();
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Joke model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

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
}
