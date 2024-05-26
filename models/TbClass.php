<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_class".
 *
 * @property int $id
 * @property string $name
 *
 * @property Beast[] $beasts
 * @property Food[] $foods
 */
class TbClass extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_class';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 75],
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
        ];
    }

    /**
     * Gets query for [[Beasts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBeasts()
    {
        return $this->hasMany(Beast::class, ['tb_class_id' => 'id']);
    }

    /**
     * Gets query for [[Foods]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFoods()
    {
        return $this->hasMany(Food::class, ['tb_class_id' => 'id']);
    }
}
