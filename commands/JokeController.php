<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;
use app\models\Joke;

/**
 * This command does stuff.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class JokeController extends Controller
{
    /**
     * This command publishes approved jokes, parametar is number of jokes to be published
     * @param string $message the message to be echoed.
     */
    public function actionPublish($number = 1)
    {
       for($i =0; $i <$number;$i++){
           
            $model = Joke:: find()->where(['joke_status_id'=> 3])->one();
            $model->joke_status_id= 4;
            $model->save();
        }
       
       echo 'Objavljeno!';
    }

     public function actionJokeOfDay()
    {     
   
        if(Joke:: find()->where(['not', ['joke_of_day_date' => null]])->andWhere(['joke_status_id' => 3])->count()==Joke::find()->where(['joke_status_id' => 3])->count()) {
           //send email to admin that we don't have candidates for joke of day
        } else {
            $array=[];
            $model= Joke::find()->where(['joke_of_day_date' => null])->andWhere(['joke_status_id' => 3])->all();
            
            if(!empty($model)){              
                foreach ($model as $key => $value) {
                      $array[]=($value['joke_rating']); 
                }  
                $max=max($array);                                            
            }

            $model= Joke::find()->where(['joke_of_day_date' => null])->andWhere(['joke_status_id' => 3])->andWhere(['joke_rating' => $max])->one();
            $date=date('Y-m-d');
            $model->joke_of_day_date=$date;
            $model->save();
           
        }
           

       echo "Imamo vic dana!";
    }

}