<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "komentari".
 *
 * @property string $IDkomentar
 * @property string $IDvic
 * @property string $od
 * @property string $od_email
 * @property resource $komentar
 * @property string $vrijeme
 */
class Komentari extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{komentari}}';
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
            [['IDvic'], 'integer'],
            [['komentar'], 'required'],
            [['komentar'], 'string'],
            [['vrijeme'], 'safe'],
            [['od'], 'string', 'max' => 20],
            [['od_email'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IDkomentar' => 'Idkomentar',
            'IDvic' => 'Idvic',
            'od' => 'Od',
            'od_email' => 'Od Email',
            'komentar' => 'Komentar',
            'vrijeme' => 'Vrijeme',
        ];
    }

    public function getVicevi()
    {
        return $this->hasOne(Vicevi::className(), ['IDvic' => 'IDvic']);
    }

}
