<?php

namespace app\modules\user\models;

use Yii;
use yii\base\Model;
use app\modules\user\models\AuthUsers;
use app\modules\user\models\CUser;

/**
 * LoginForm is the model behind the login form.
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules() 
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
           ['password', 'validatePassword'],
        ];
    }

      /**
     * Validates the username and password.
     * This method serves as the inline validation for password.
     */
    public function validatePassword()
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
 
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError('password', 'Неверное имя пользователя или пароль.');
            } elseif ($user && $user->ACTIVE == AuthUsers::STATUS_BLOCKED) {
                $this->addError('username', 'Ваш аккаунт заблокирован.');
            } elseif ($user && $user->ACTIVE == AuthUsers::STATUS_WAIT) {
                $this->addError('username', 'Ваш аккаунт не подтвежден.');
            }
        }
    }
 
    /**
     * Logs in a user using the provided username and password.
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
		/* $this->username = $_POST['LoginForm']['username'];
		$this->password = $_POST['LoginForm']['password'];
		$this->rememberMe = $_POST['LoginForm']['rememberMe']; */
		
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser());
        } else {
            return false;
        }
    }
 
    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
		
		if($this->_user === false) 
		{
			//$user = CUser::find()->byLogin($this->username);
			$this->_user = AuthUsers::findByLogin($this->username);
        }
 
        return $this->_user;
		//https://toster.ru/q/132939
    }
}
