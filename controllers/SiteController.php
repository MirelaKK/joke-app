<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\EntryForm;
use app\models\Joke;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\JokeCategory;


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
            ]
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

    public function actionSearch(){
        
        $searchModel = new SiteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('best', [
            'listDataProvider' => $dataProvider,
        ]);
    }
}
