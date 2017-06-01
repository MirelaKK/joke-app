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

    public function actionContact()
    {
        return $this->render('contact');
    
    }

    public function actionSend()
    {
        return $this->render('send');
    
    }


    public function actionOverview(){
        $query = Category::find();
        
        $provider = new ActiveDataProvider([
                    'query' => $query]);

        return $this -> render('overview',
                            ['dataProvider' => $provider]);
    }

    public function actionUpdate() {

        if(!empty(Yii::$app->request->get('id'))) {

            $category = Category::findOne(Yii::$app->request->get('id'));
        } else {
            $category = new Category;
        }


        if (Yii::$app->request->isPost) { 

            $values= \Yii::$app->request->post('Category');

            $category -> attributes = $values;
            $category ->save();
                
            $this->redirect(['category/overview']); 
            
        } else {
            // either the page is initially displayed or there is some validation error
            return $this->render('add', ['category' => $category]);
        }
        
    }

    public function actionDelete() {

        $category = Category::findOne(Yii::$app->request->get('id'));
        $category ->delete();

        $this->redirect(['category/overview']); 

    }
    
}




