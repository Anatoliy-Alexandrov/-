<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "animal".
 *
 * @property int $id
 * @property string $name
 * @property string $nickname
 * @property string $description
 * @property string $year
 * @property int $beast_id
 *
 * @property Beast $beast
 * @property Food[] $foods
 * @property Food[] $foods0
 * @property Veterinar[] $veterinars
 * @property Veterinar[] $veterinars0
 */
class Animal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'animal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'nickname', 'description', 'year', 'beast_id'], 'required'],
            [['beast_id'], 'integer'],
            [['name', 'nickname'], 'string', 'max' => 75],
            [['description'], 'string', 'max' => 250],
            [['year'], 'string', 'max' => 30],
            [['beast_id'], 'exist', 'skipOnError' => true, 'targetClass' => Beast::class, 'targetAttribute' => ['beast_id' => 'id']],
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
            'nickname' => 'Nickname',
            'description' => 'Description',
            'year' => 'Year',
            'beast_id' => 'Beast ID',
        ];
    }

    /**
     * Gets query for [[Beast]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBeast()
    {
        return $this->hasOne(Beast::class, ['id' => 'beast_id']);
    }

    /**
     * Gets query for [[Foods]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFoods()
    {
        return $this->hasMany(Food::class, ['name_id' => 'id']);
    }

    /**
     * Gets query for [[Foods0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFoods0()
    {
        return $this->hasMany(Food::class, ['nickname_id' => 'id']);
    }

    /**
     * Gets query for [[Veterinars]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVeterinars()
    {
        return $this->hasMany(Veterinar::class, ['name_id' => 'id']);
    }

    /**
     * Gets query for [[Veterinars0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVeterinars0()
    {
        return $this->hasMany(Veterinar::class, ['nickname_id' => 'id']);
    }
}
