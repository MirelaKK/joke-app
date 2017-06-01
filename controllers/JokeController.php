<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use app\models\Joke;

class JokeController extends Controller
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
        $query = Joke::find();
        
        $provider = new ActiveDataProvider([
                    'query' => $query]);

        return $this -> render('overview',
                            ['dataProvider' => $provider]);
    }

    public function actionUpdate() {

        if(!empty(Yii::$app->request->get('id'))) {

            $joke = Joke::findOne(Yii::$app->request->get('id'));
        } else {
            $joke = new Joke;
        }


        if (Yii::$app->request->isPost) { 

            $values= \Yii::$app->request->post('Joke');

            $joke -> attributes = $values;
            $joke ->save();
                
            $this->redirect(['joke/overview']); 
            
        } else {
            // either the page is initially displayed or there is some validation error
            return $this->render('add', ['joke' => $joke]);
        }
        
    }

    public function actionDelete() {

        $joke = joke::findOne(Yii::$app->request->get('id'));
        $joke ->delete();

        $this->redirect(['joke/overview']); 

    }

    
    
}




