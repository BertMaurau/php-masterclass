<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $auth_key
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    public function beforeSave($insert)
    {
        if ($this -> isAttributeChanged('password')) {
            $this -> password = \Yii::$app -> security -> generatePasswordHash($this -> password);
        }
        if (parent::beforeSave($insert)) {
            if ($this -> isNewRecord) {
                $this -> auth_key = \Yii::$app -> security -> generateRandomString();
            }
            return true;
        }

        return false;
    }

    public function login()
    {
        if (!$this -> validate())
            return false;

        $user = $this -> getUser($this -> username);

        if (!$user)
            return false;

        return Yii::$app -> user -> login(
                        $user, $this -> rememberMe ? 3600 * 24 * 30 : 0
        );
    }

    /**
     * Finds an identity by the given ID.
     *
     * @param string|int $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('You can only login by username/password pair for now.');
    }

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this -> id;
    }

    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
        return $this -> auth_key;
    }

    /**
     * @param string $authKey
     * @return bool if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return $this -> getAuthKey() === $authKey;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['username', 'password'], 'string', 'max' => 32],
            [['auth_key'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'       => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'auth_key' => 'Auth Key',
        ];
    }

}
