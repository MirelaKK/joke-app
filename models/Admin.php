<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

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
class Admin extends \yii\db\ActiveRecord implements IdentityInterface
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
            [['first_name', 'last_name', 'email', 'password', 'active'], 'required','message'=>'Polje ne može biti prazno'],
            [['active'], 'integer'],
            [['first_name', 'last_name'], 'string', 'max' => 50],
            [['email'], 'string', 'max' => 100],
            [['password'], 'string', 'max' => 10],
             ['password', 'filter', 'filter' => function ($password) {
                return Yii::$app->getSecurity()->generatePasswordHash($password); 
            }],
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
            'active' => 'Aktivan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJokes()
    {
        return $this->hasMany(Joke::className(), ['admin_id' => 'id']);
    }
    
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
    }
    public static function findByUsername($username)
    {
        return static::findOne(['email' => $username]);
    }

    public function getId()
    {
        return $this->id;
    }
    
    public function getAuthKey()
    {
        throw new \yii\web\NotSupportedException;
    }

    public function validateAuthKey($authKey)
    {
        throw new \yii\web\NotSupportedException;
    }
    
    public function validatePassword($password){
        return Yii::$app->getSecurity()->validatePassword($password, Yii::$app->getSecurity()->generatePasswordHash($password));
      //  return Security::validatePassword($password, $this->password_hash);
    }
    public static function findIdentityByAccessToken($token, $type = NULL){
        throw new \yii\web\NotSupportedException;
    }
    
}
