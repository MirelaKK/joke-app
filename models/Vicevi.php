<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vicevi".
 *
 * @property string $IDvic
 * @property string $IDkat
 * @property string $od
 * @property string $odmail
 * @property string $naslov
 * @property resource $vic
 * @property string $datum
 * @property string $datum_pred
 * @property integer $glasova
 * @property integer $poena
 * @property integer $odobren
 */
class Vicevi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{vicevi}}';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db1');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IDkat', 'glasova', 'poena', 'odobren'], 'integer'],
            [['vic'], 'required'],
            [['vic'], 'string'],
            [['datum', 'datum_pred'], 'safe'],
            [['od'], 'string', 'max' => 20],
            [['odmail', 'naslov'], 'string', 'max' => 40],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IDvic' => 'Idvic',
            'IDkat' => 'Idkat',
            'od' => 'Od',
            'odmail' => 'Odmail',
            'naslov' => 'Naslov',
            'vic' => 'Vic',
            'datum' => 'Datum',
            'datum_pred' => 'Datum Pred',
            'glasova' => 'Glasova',
            'poena' => 'Poena',
            'odobren' => 'Odobren',
        ];
    }

    public function getKomentari()
    {
        return $this->hasMany(Komentari::className(), ['IDvic' => 'IDvic']);
    }

    public function getVicDana()
    {
        return $this->hasOne(Vic::className(), ['IDvic' => 'IDvic']);
    }
}
