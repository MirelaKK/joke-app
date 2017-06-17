<?php

namespace app\commands;

use yii\console\Controller;
use Yii;
use app\models\Vicevi;
use app\models\Vic;
use app\models\Komentari;
use app\models\Category;

/**
 * This command does stuff.
 */
class DbController extends Controller
{
        /**
     * This command writes data from one database to another
     * @param string $message the message to be echoed.
     */

     public function actionWrite()
    {
      $kat= Category::find()                      
          ->select('id')
          ->asArray()
          ->all();

      $array=[];
      foreach($kat as $t) {
          $array[]=$t['id'];
      }
      
    foreach (Vicevi::find()->each() as $rows) {
        $vic= $rows['vic'];
        $naslov= $rows['naslov'];
        $od= $rows['od'];
        $IDkat= $rows['IDkat'];
        $datumpred= $rows['datum_pred'];
        $datum= $rows['datum'];
        $glasova= $rows['glasova'];
        $poena= $rows['poena'];
        $odobren= $rows['odobren'];
        $status = 1;
       
        // setting joke_status
                if($odobren == 0){
                    $status = 2;
                }elseif($odobren == 1) {
                    $status =4;
                }
       
        //inserting values
       Yii::$app->db->createCommand()->insert('joke',
           [  
               'title'      =>$this->strReplace($naslov),
               'joke'       =>$this->strReplace($vic),
               'submitter'  =>$this->strReplace($od),
               'submit_date'=>$datumpred,
               'publish_date'=>$datum,
               'approval_date'=>$datum,
               'joke_rating'=> $poena/$glasova,
               'joke_status_id'=>$status,
           ])->execute();

       $id=Yii::$app->db->getLastInsertID();
       if(!empty(Vicevi::findOne($rows['IDvic'])->komentari)) {
        

          foreach(Vicevi::findOne($rows['IDvic'])->komentari as $kom) {
              $vrijeme=$kom->vrijeme;
              $od=$kom->od;
              $komentar=$kom->komentar;
              //inserting values
           Yii::$app->db->createCommand()->insert('joke_comments',
               [
                   'joke_id'      =>$id,
                   'submitter'    =>$this->strReplace($od),
                   'submit_date'=>$vrijeme,
                   'joke_comment'=>$this->strReplace($komentar),
                   'active'=>1,
               ])->execute();
          }
          
        }

         if(!empty(Vicevi::findOne($rows['IDvic'])->vicDana)) {
        
          //inserting values
         Yii::$app->db->createCommand()->update('joke',
             ['joke_of_day_date'=>Vicevi::findOne($rows['IDvic'])->vicDana->datum],
                 'id=:id')
                  ->bindParam(':id', $id)
                  ->execute();
         }
       
       //inserting categories of jokes
         if(in_array($rows['IDkat'], $array)) {
            Yii::$app->db->createCommand()->insert('joke2category',
             ['joke_id'=> $id,
                 'category_id'=>$IDkat,
                 
             ])->execute();
         }
         
    }

    }

    public function strReplace($s) {
     
            $s=str_replace("Ã¦","ć",$s);
            $s=str_replace("Ä","Ć",$s);
            $s=str_replace("Ã¨","č",$s);
            $s=str_replace("ĂŚ","ć",$s);
            $s=str_replace("Ă","Č",$s);
            $s=str_replace("Â®","Ž",$s);
            $s=str_replace("Â¹","š",$s);
            $s=str_replace("Â¾","ž",$s);
            $s=str_replace("Â©","Š",$s);
            $s=str_replace("ÂŠ","Š",$s);
            $s=str_replace("Ã°","đ",$s);
            $s=str_replace("Ä","Đ",$s);
            
            $s=str_replace("Âš","š",$s);
            $s=str_replace("Ă¨","č",$s);
            $s=str_replace("ĂŚ","ć",$s);
            
            
            return $s;
            
        }
  
  
}