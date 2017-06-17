<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vic_dana".
 *
 * @property string $datum
 * @property integer $IDvic
 */
class Vic extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{vic_dana}}';
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
            [['datum'], 'required'],
            [['datum'], 'safe'],
            [['IDvic'], 'integer'],
            [['datum'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'datum' => 'Datum',
            'IDvic' => 'Idvic',
        ];
    }

    public function getVicevi()
    {
        return $this->hasOne(Vicevi::className(), ['IDvic' => 'IDvic']);
    }
}
