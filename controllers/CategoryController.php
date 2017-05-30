<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use app\models\Category;
use app\models\Joke;

class CategoryController extends Controller
{
    
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }

    /**
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    
    }
    public function actionOverview(){
        $query = Category::find();
        
        $provider = new ActiveDataProvider([
                    'query' => $query]);

        return $this -> render('overview',
                            ['dataProvider' => $provider]);
    }
    public function actionUpdate(){
        
    }
    
}
