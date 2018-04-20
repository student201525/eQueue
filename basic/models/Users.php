<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $firstName
 * @property string $secondName
 * @property string $login
 * @property string $password
 * @property string $role
 *
 * @property Operators[] $operators
 */
class Users extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'users';
    }


    public function rules()
    {
        return [
            [['firstName', 'secondName', 'login', 'password', 'role'], 'required'],
            [['firstName', 'secondName', 'login', 'password', 'role'], 'string', 'max' => 255],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstName' => 'First Name',
            'secondName' => 'Second Name',
            'login' => 'Login',
            'password' => 'Password',
            'role' => 'Role',
        ];
    }


    public function getOperators()
    {
        return $this->hasMany(Operators::className(), ['idUser' => 'id']);
    }



    public static function findIdentity($id)
    {
        return static::findOne($id);
    }


    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(["accessToken"=>$token]);
    }


    public static function findByLogin($login)
    {
      return static::findOne(["login"=>$login]);
    }


    public function getId()
    {
        return $this->id;
    }


    public function getAuthKey()
    {
        return $this->authKey;
    }


    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }


    public function validatePassword($password)
    {
        return $this->password === md5($password);
    }
}
