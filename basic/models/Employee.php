<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "employees".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $surname
 * @property string|null $birthday
 * @property int $access_level_id
 * @property int $role_id
 *
 * @property AccessLevel $accessLevel
 * @property Role $role
 */
class Employee extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employees';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['birthday'], 'safe'],
            [['access_level_id', 'role_id'], 'required'],
            [['access_level_id', 'role_id'], 'integer'],
            [['name', 'surname', 'username', 'password', 'authKey', 'accessToken'], 'string', 'max' => 255],
            [['access_level_id'], 'exist', 'skipOnError' => true, 'targetClass' => AccessLevel::class, 'targetAttribute' => ['access_level_id' => 'id']],
            [['role_id'], 'exist', 'skipOnError' => true, 'targetClass' => Role::class, 'targetAttribute' => ['role_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'surname' => 'Surname',
            'birthday' => 'Birthday',
            'access_level_id' => 'Access Level ID',
            'role_id' => 'Role ID',
            'username' => 'Username',
            'password' => 'Password',
            'authKey' => 'Authorization key',
            'accessToken' => 'Access token'
        ];
    }

    /**
     * Gets query for [[AccessLevel]].
     *
     * @return ActiveQuery
     */
    public function getAccessLevel()
    {
        return $this->hasOne(AccessLevel::class, ['id' => 'access_level_id']);
    }

    /**
     * Gets query for [[Role]].
     *
     * @return ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(Role::class, ['id' => 'role_id']);
    }
    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);

    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        $hash = \Yii::$app->getSecurity()->generatePasswordHash($password);
        return Yii::$app->getSecurity()->validatePassword($password, $hash);
    }
}
