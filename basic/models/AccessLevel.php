<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "access_levels".
 *
 * @property int $id
 * @property string|null $title
 * @property int|null $status
 *
 * @property ConstructionSite[] $constructionSites
 * @property Employee[] $employees
 */
class AccessLevel extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'access_levels';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[ConstructionSites]].
     *
     * @return ActiveQuery
     */
    public function getConstructionSites()
    {
        return $this->hasMany(ConstructionSite::class, ['access_level_id' => 'id']);
    }

    /**
     * Gets query for [[Employees]].
     *
     * @return ActiveQuery
     */
    public function getEmployees()
    {
        return $this->hasMany(Employee::class, ['access_level_id' => 'id']);
    }
}
