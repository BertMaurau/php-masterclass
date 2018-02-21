<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class LoginForm extends Model
{

    public $username;
    public $password;
    public $rememberMe = true;
    private $_user = false;
    public $user;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            ['rememberMe', 'boolean'],
            ['password', 'validatePassword']
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attributeName)
    {
        if ($this -> hasErrors())
            return;

        $user = $this -> getUser($this -> username);

        if (!($user and $this -> isCorrectHash($this -> $attributeName, $user -> password)))
            $this -> addError('password', 'Incorrect username or password.');
    }

    private function getUser($username = null)
    {
        if (!$this -> user)
            $this -> user = $this -> fetchUser($username);

        return $this -> user;
    }

    private function fetchUser($username)
    {
        return User::findOne(compact('username'));
    }

    private function isCorrectHash($plaintext, $hash)
    {
        return \Yii::$app -> security -> validatePassword($plaintext, $hash);
    }

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this -> validate()) {
            return Yii::$app -> user -> login($this -> getUser(), $this -> rememberMe ? 3600 * 24 * 30 : 0);
        }
        return false;
    }

}
