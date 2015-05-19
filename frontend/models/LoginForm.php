<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use frontend\models\Employee;
use frontend\models\Department;

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
            ['password', 'validateExpiredUser'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {    
                $this->addError($attribute, 'Incorrect username or passwords.'.$user->old_password($this->password));
            }
        }
    }
    
    public function validateExpiredUser($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();          
            if(!$user || !$user->expire === '0000-00-00'){
                $this->addError($attribute, 'Your account is expired!.');
            }
        }
    }
    

    /**
     * Logs in a user using the provided username and password.
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            $user = $this->getUser();
            
            return Yii::$app->user->login($user, $this->rememberMe ? 3600*24*30 : 0);
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
        if ($this->_user === false) {
            $this->_user = Employee::findByUsername($this->username);
        }

        return $this->_user;
    }
}