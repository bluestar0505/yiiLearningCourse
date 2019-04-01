<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;
use yii\db\ActiveRecord;
use yii\base\NotSupportedException;

class User extends ActiveRecord implements IdentityInterface
{
    const SUPER_TYPE = 0;
    const ADMIN_TYPE = 1;

    public static function tableName()
    {
        return "users";
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['userid' => $id]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }
    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return md5($password) === $this->password;
    }

    public function setPassword($password)
    {
        $this->password = md5($password);
    }

    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }


    public static function isSuperAdmin(){
        $user = static::findOne(['userid' => Yii::$app->user->id]);

        if(is_null($user)) return false;
        return $user->usertype === static::SUPER_TYPE ? true : false;
    }

    public static function isAdmin(){
        $user = static::findOne(['userid' => Yii::$app->user->id]);

        if(is_null($user)) return false;
        return $user->usertype === static::ADMIN_TYPE ? true : false;
    }
}
