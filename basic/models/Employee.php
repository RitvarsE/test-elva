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
class Employee extends \yii\db\ActiveRecord
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
            [['name', 'surname'], 'string', 'max' => 255],
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
}
