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
        ]);

        $db->open();
        
        $count = $db->createCommand('SELECT COUNT(*) FROM vicevi')
             ->queryScalar();
        $rows = $db->createCommand('SELECT IDvic, IDkat, od, naslov, vic, datum_pred, datum, poena, glasova, odobren  FROM vicevi')->queryAll();
        
       //ignoring keys
       Yii::$app->db->createCommand()->checkIntegrity(false)->execute();
       // looping through columns and writing them
       for($i =0; $i <= $count; $i++){
           
        $vic= $rows[$i]['vic'];
        $naslov= $rows[$i]['naslov'];
        $od= $rows[$i]['od'];
        $IDvic= $rows[$i]['IDvic'];
        $IDkat= $rows[$i]['IDkat'];
        $datumpred= $rows[$i]['datum_pred'];
        $datum= $rows[$i]['datum'];
        $glasova= $rows[$i]['glasova'];
        $poena= $rows[$i]['poena'];
        $odobren= $rows[$i]['odobren'];
        $status = 1;
       
           // setting joke_status
                if($odobren == 0){
                    $status = 2;
                }elseif($odobren == 1) {
                    $status =4;
                }
       
        //insertin values
       Yii::$app->db->createCommand()->insert('joke',
           ['id'=>$IDvic,
               'title'      =>$this->strReplace($naslov),
               'joke'       =>$this->strReplace($vic),
               'submitter'  =>$this->strReplace($od),
               'submit_date'=>$datumpred,
               'publish_date'=>$datum,
               'joke_rating'=> $poena/$glasova,
               'joke_status_id'=>$status,
           ])->execute();
       
       Yii::$app->db->createCommand()->insert('joke2category',
           ['joke_id'=>$IDvic,
               'category_id'=>$IDkat,
               
           ])->execute();
       }
     
       Yii::$app->db->createCommand()->checkIntegrity(true)->execute();
       $db->close();
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
  public function actionWriteJODDate(){
      
      $db = new \yii\db\Connection([
            'dsn' => 'mysql:host=localhost;dbname=stari_vicevi',
            'username' => 'root',
            'password' => '',
        ]);

        $db->open();
        
        $count = $db->createCommand('SELECT COUNT(*) FROM vic_dana')
             ->queryScalar();
        $datum= $db->createCommand('SELECT datum FROM vic_dana')
             ->queryColumn();
        $IDvic= $db->createCommand('SELECT IDvic FROM vic_dana')
             ->queryColumn();
        
        for($i =0; $i <= $count; $i++){
        Yii::$app->db->createCommand()->update('joke',
           ['joke_of_day_date'=>$datum[$i]],
               'id=:id')
                ->bindParam(':id', $IDvic[$i])
                ->execute();
        }
        
        $db->close();
  }
  
  public function actionWriteComments(){
      
      $db = new \yii\db\Connection([
            'dsn' => 'mysql:host=localhost;dbname=stari_vicevi',
            'username' => 'root',
            'password' => '',
        ]);

        $db->open();
        
        $count = $db->createCommand('SELECT COUNT(*) FROM komentari')
             ->queryScalar();
        $rows = $db->createCommand('SELECT IDvic, IDkomentar, od, komentar, vrijeme  FROM komentari')->queryAll();
        
       //ignoring keys
       Yii::$app->db->createCommand()->checkIntegrity(false)->execute();
       // looping through columns and writing them
       for($i =0; $i <= $count; $i++){
           
        $id= $rows[$i]['IDkomentar'];
        $IDvic= $rows[$i]['IDvic'];
        $od= $rows[$i]['od'];
        $komentar= $rows[$i]['komentar'];
        $vrijeme= $rows[$i]['vrijeme'];
    
        //insertin values
       Yii::$app->db->createCommand()->insert('joke_comments',
           ['id'=>$id,
               'joke_id'      =>$IDvic,
               'submitter'    =>$this->strReplace($od),
               'submit_date'=>$vrijeme,
               'joke_comment'=>$this->strReplace($komentar),
               'active'=>1,
           ])->execute();
  }
  $db->close();
  }
}