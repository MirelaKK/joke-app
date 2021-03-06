<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Joke;
use yii\data\ActiveDataProvider;
use app\models\SiteJokeSearch;
use app\models\SiteSearch;
use app\models\Contact;
use app\models\Category;
use app\models\JokeCommentsSearch;
use app\models\JokeRating;


class SiteController extends Controller
{
   public $layout='jokes';
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
   
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $joke_of_day = $this->renderPartial('_joke', ['model'=>Joke::getJokeOfDay()]);
        
        $dataProvider = new ActiveDataProvider([
            'query' => Joke::getNewJokes(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        
        $new = $this->renderPartial('all', ['listDataProvider'=>$dataProvider]);
        
        return $this->render('index',[
            'joke_of_day'=> $joke_of_day,
            'new_jokes'=>$new,
        ]);
    }

    /**
     * Displays best jokes.
     *
     * @return string
     */
    public function actionBest()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Joke::getBestJokes(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        $this->view->title .= 'Najbolji vicevi';
        return $this->render('all', [
            'listDataProvider' => $dataProvider,
        ]);
    }

     public function actionNew()
    {   
        $dataProvider = new ActiveDataProvider([
            'query' => Joke::getNewJokes(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        $this->view->title .= 'Najnoviji vicevi';
        
        return $this->render('all', [
            'listDataProvider' => $dataProvider,
        ]);
    }
    
    public function actionJokeCategory($id){
        $model = new SiteJokeSearch();
        $dataProvider = $model->search(['SiteJokeSearch'=>['category_ids'=>[$id]]]);
        
        $this->view->title .= Category::findOne($id)->category;
        return $this->render('all', [
            'listDataProvider' => $dataProvider,
            'id'=>$id,
        ]);

    }


    
    /**
    *function for listing jokes from categories
    **/
    public function actionCategory($id){

        
        $jokeModel= Joke::findOne($id);
        $commentModel= new JokeCommentsSearch();
        $dataProvider = $commentModel->search(['joke_id'=>$id]);
        $ratingModel = new JokeRating();



    // Saving comments
         if ($commentModel->load(Yii::$app->request->post()) && $commentModel->save()) {
                return $this->redirect(['category', 'id' => $id]);
        }
        //saving rating
        if ($ratingModel->load(Yii::$app->request->post()) && $ratingModel->save()) {
                return $this->redirect(['category', 'id' => $id]);
        }

        //saving ratings
        if ($jokeModel->load(Yii::$app->request->post()) && $jokeModel->save()) {
                return $this->redirect(['category', 'id' => $id]);
        }
        
        return $this->render('joke', [
            'jokeModel' => $jokeModel,
            'commentModel' => $commentModel,
            'dataProvider' => $dataProvider,
            'ratingModel' =>$ratingModel
        ]);
        
       

    }


    public function actionSearch(){
        
        $searchModel = new SiteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('all', [
            'listDataProvider' => $dataProvider,
        ]);
    }

   /**
     * Creates a new Joke model and sends data to database.
     * @return string
     */
    
    public function actionSend(){
        
        $model = new Joke();
        
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            Yii::$app->session->setFlash('jokeSent');

            $model->save();
        }
        return $this->render('send', [
            'model' => $model,
        ]);
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new Contact();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /*
     * Finds next Joke model within same category 
     * 
     */
    public function actionNextJoke($id) {

        $ratingModel = new JokeRating();

        $model=JokeCategory::findOne($id)->category_id;

        $jokes=JokeCategory::find()->where(['category_id'=>$model])->andWhere(['>','joke_id', $id])->orderBy(['joke_id'=> SORT_ASC])->all();

        foreach ($jokes as $k=>$v){ 
            if(Joke::findOne($v['joke_id'])->joke_status_id==4) {
                $commentModel= new JokeCommentsSearch();
                $dataProvider = $commentModel->search(['joke_id'=>$v['joke_id']]);
                $query= Joke::findOne($v['joke_id']);

                // Saving comments
         if ($commentModel->load(Yii::$app->request->post()) && $commentModel->save()) {
                return $this->redirect(['category', 'id' => $id]);
        }
        //saving rating
        if ($ratingModel->load(Yii::$app->request->post()) && $ratingModel->save()) {
                return $this->redirect(['category', 'id' => $id]);
        }

        //saving ratings
        if ($query->load(Yii::$app->request->post()) && $query->save()) {
                return $this->redirect(['category', 'id' => $id]);
        }
                return $this->render('joke', [
                    'jokeModel' => $query,
                    'commentModel' => $commentModel,
                    'dataProvider'=>$dataProvider,
            'ratingModel' =>$ratingModel
                ]);
            }
        }

        if(empty($query)) {
           return $this->redirect(Yii::$app->request->referrer); 
        }
        
    }

    /*
     * Finds last Joke model within same category 
     * 
     */
    public function actionLastJoke($id) {

        $ratingModel = new JokeRating();

        $model=JokeCategory::findOne($id)->category_id;

        $jokes=JokeCategory::find()->where(['category_id'=>$model])->andWhere(['<','joke_id', $id])->orderBy(['joke_id'=> SORT_DESC])->all();

        foreach ($jokes as $k=>$v){ 
            if(Joke::findOne($v['joke_id'])->joke_status_id==4) {
                $commentModel= new JokeCommentsSearch();
                $dataProvider = $commentModel->search(['joke_id'=>$v['joke_id']]);
                $query= Joke::findOne($v['joke_id']);

                // Saving comments
         if ($commentModel->load(Yii::$app->request->post()) && $commentModel->save()) {
                return $this->redirect(['category', 'id' => $id]);
        }
        //saving rating
        if ($ratingModel->load(Yii::$app->request->post()) && $ratingModel->save()) {
                return $this->redirect(['category', 'id' => $id]);
        }

        //saving ratings
        if ($query->load(Yii::$app->request->post()) && $query->save()) {
                return $this->redirect(['category', 'id' => $id]);
        }
                return $this->render('joke', [
                    'jokeModel' => $query,
                    'commentModel' => $commentModel,
                    'dataProvider'=>$dataProvider,
            'ratingModel' =>$ratingModel
                ]);
            }
        }

        if(empty($query)) {
           return $this->redirect(Yii::$app->request->referrer); 
        }
        
    }

}
