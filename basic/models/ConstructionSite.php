<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "construction_sites".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $location
 * @property float|null $area
 * @property int $access_level_id
 *
 * @property AccessLevel $accessLevel
 */
class ConstructionSite extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'construction_sites';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'location'], 'string'],
            [['area'], 'number'],
            [['access_level_id'], 'required'],
            [['access_level_id'], 'integer'],
            [['access_level_id'], 'exist', 'skipOnError' => true, 'targetClass' => AccessLevel::class, 'targetAttribute' => ['access_level_id' => 'id']],
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
            'location' => 'Location',
            'area' => 'Area',
            'access_level_id' => 'Access Level ID',
        ];
    }

    /**
     * Gets query for [[AccessLevel]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAccessLevel()
    {
        return $this->hasOne(AccessLevel::class, ['id' => 'access_level_id']);
    }
}
