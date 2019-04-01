<?php
namespace app\models;


use app\models\User;
use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;
/**
 * Signup form
 */
class Signup extends Model
{
    public $userid;
    public $username;
    public $email;
    public $password;
    public $retypePassword;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        $class = Yii::$app->getUser()->identityClass ? : 'app\models\User';
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => $class, 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            ['retypePassword', 'required'],
            ['retypePassword', 'compare', 'compareAttribute' => 'password'],
        ];
    }
    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $class = Yii::$app->getUser()->identityClass ? : 'app\models\User';
            $user = new $class();
            $user->username = $this->username;
            $user->usertype = User::ADMIN_TYPE;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            if ($user->save()) {
                return $user;
            }
        }
        return null;
    }


    public function change($id)
    {
        if ($this->validate()) {
            $user = User::findOne($id);
            $user->username = $this->username;
            $user->usertype = User::ADMIN_TYPE;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            if ($user->save()) {
                return $user;
            }
        }
        return null;
    }
}