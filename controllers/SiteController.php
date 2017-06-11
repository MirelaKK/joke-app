<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Joke;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\JokeSearch;
use app\models\SiteSearch;
use app\models\Contact;

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
        return $this->render('index');
    }

    /**
     * Displays best jokes.
     *
     * @return string
     */
    public function actionBest()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Joke::find()->orderBy(['joke_rating' => SORT_DESC]),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        return $this->render('best', [
            'listDataProvider' => $dataProvider,
        ]);
    }

     public function actionNew()
    {   
        $dataProvider = new ActiveDataProvider([
            'query' => Joke::find()->orderBy(['publish_date' => SORT_DESC]),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        return $this->render('new', [
            'listDataProvider' => $dataProvider,
        ]);
    }
    
    public function actionJokeCategory($id){
        $model = new JokeSearch();
        $dataProvider = $model->search(['JokeSearch'=>['category_ids'=>[$id]]]);

        return $this->render('best', [
            'listDataProvider' => $dataProvider,
        ]);

    }

    public function actionSearch(){
        
        $searchModel = new SiteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('best', [
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
}
