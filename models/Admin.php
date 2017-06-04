<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "admin".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $password
 * @property integer $active
 *
 * @property Joke[] $jokes
 */
class Admin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{admin}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'email', 'password', 'active'], 'required'],
            [['active'], 'integer'],
            [['first_name', 'last_name'], 'string', 'max' => 50],
            [['email'], 'string', 'max' => 100],
            [['password'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'Ime',
            'last_name' => 'Prezime',
            'email' => 'Email',
            'password' => 'Password',
            'active' => 'Aktivan/Aktivna',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJokes()
    {
        return $this->hasMany(Joke::className(), ['admin_id' => 'id']);
    }
}
