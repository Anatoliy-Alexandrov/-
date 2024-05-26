<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "beast".
 *
 * @property int $id
 * @property string $name
 * @property int $tb_class_id
 * @property string $otryad
 * @property string $description
 * @property string $img
 *
 * @property Animal[] $animals
 * @property Food[] $foods
 * @property TbClass $tbClass
 */
class Beast extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'beast';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'tb_class_id', 'otryad', 'description', 'img'], 'required'],
            [['tb_class_id'], 'integer'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 75],
            [['otryad'], 'string', 'max' => 70],
            [['img'], 'string', 'max' => 50],
            [['tb_class_id'], 'exist', 'skipOnError' => true, 'targetClass' => TbClass::class, 'targetAttribute' => ['tb_class_id' => 'id']],
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
            'tb_class_id' => 'Tb Class ID',
            'otryad' => 'Otryad',
            'description' => 'Description',
            'img' => 'Img',
        ];
    }

    /**
     * Gets query for [[Animals]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAnimals()
    {
        return $this->hasMany(Animal::class, ['beast_id' => 'id']);
    }

    /**
     * Gets query for [[Foods]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFoods()
    {
        return $this->hasMany(Food::class, ['class_id' => 'id']);
    }

    /**
     * Gets query for [[TbClass]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTbClass()
    {
        return $this->hasOne(TbClass::class, ['id' => 'tb_class_id']);
    }
}
