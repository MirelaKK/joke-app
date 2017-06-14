<?php

namespace app\commands;

use yii\console\Controller;
use Yii;

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
        $db = new \yii\db\Connection([
            'dsn' => 'mysql:host=localhost;dbname=stari_vicevi',
            'username' => 'root',
            'password' => '',
            'charset' => 'latin2',// or UTF8
        ]);

        $db->open();
        
        $count = $db->createCommand('SELECT COUNT(*) FROM vicevi')
             ->queryScalar();
        
        $vic= $db->createCommand('SELECT CONVERT(vic USING utf8) FROM vicevi')
             ->queryColumn();

       $naslov= $db->createCommand('SELECT naslov FROM vicevi')
             ->queryColumn();
       $od= $db->createCommand('SELECT od FROM vicevi')
             ->queryColumn();
       $IDvic= $db->createCommand('SELECT IDvic FROM vicevi')
             ->queryColumn();
       $IDkat= $db->createCommand('SELECT IDkat FROM vicevi')
             ->queryColumn();
       $datumpred= $db->createCommand('SELECT datum_pred FROM vicevi')
             ->queryColumn();
       $datum= $db->createCommand('SELECT datum FROM vicevi')
             ->queryColumn();
       $glasova= $db->createCommand('SELECT glasova FROM vicevi')
             ->queryColumn();
        $poena= $db->createCommand('SELECT poena FROM vicevi')
             ->queryColumn();
        $odobren= $db->createCommand('SELECT odobren FROM vicevi')
             ->queryColumn();
       $status = 1;
       
       //ignoring keys
       Yii::$app->db->createCommand()->checkIntegrity(false)->execute();
       // looping through columns and writing them
       for($i =0; $i <= 5; $i++){
           // setting joke_status
                if($odobren[$i] == 0){
                    $status = 2;
                }elseif($odobren[$i] == 1) {
                    $status =4;
                }
       
        
       Yii::$app->db->createCommand()->insert('joke',
           ['id'=>$IDvic[$i],
               'title'=>$this->strReplace($naslov[$i]),
               'joke'=>$this->strReplace($vic[$i]),
               'submitter'=>$this->strReplace($od[$i]),
               'submit_date'=>$datumpred[$i],
               'publish_date'=>$datum[$i],
               'joke_rating'=> $poena[$i]/$glasova[$i],
               'joke_status_id'=>$status,
           ])->execute();
       
       Yii::$app->db->createCommand()->insert('joke2category',
           ['joke_id'=>$IDvic[$i],
               'category_id'=>$IDkat[$i],
               
           ])->execute();
       }
       //getting back the keys
       Yii::$app->db->createCommand()->checkIntegrity(true)->execute();
    }
    public function strReplace($s) {
     
            $s=str_replace("Ã¦","ć",$s);
            
            $s=str_replace("Ã¨","č",$s);
            
            $s=str_replace("Â®","Ž",$s);
            $s=str_replace("Â¹","š",$s);
            $s=str_replace("Â¾","ž",$s);
            $s=str_replace("Â©","Š",$s);
            
            $s=str_replace("Ã°","đ",$s);
            
            
            return $s;
            
        }
  public function actionWriteJODDate(){
      
      $db = new \yii\db\Connection([
            'dsn' => 'mysql:host=localhost;dbname=stari_vicevi',
            'username' => 'root',
            'password' => '',
            'charset' => 'latin2',//or UTF8
        ]);

        $db->open();
        
        $count = $db->createCommand('SELECT COUNT(*) FROM vic_dana')
             ->queryScalar();
        $datum= $db->createCommand('SELECT datum FROM vic_dana')
             ->queryColumn();
        $IDvic= $db->createCommand('SELECT IDvic FROM vic_dana')
             ->queryColumn();
        
        for($i =0; $i <= 5; $i++){
        Yii::$app->db->createCommand()->update('joke',
           ['joke_of_day_date'=>$datum[$i]],
               'id=:id')
                ->bindParam(':id', $IDvic[$i])
                ->execute();
        }
  }
}