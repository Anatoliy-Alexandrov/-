<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "veterinar".
 *
 * @property int $id
 * @property int $name_id
 * @property int $nickname_id
 * @property int|null $diagnoz
 *
 * @property Animal $name
 * @property Animal $nickname
 */
class Veterinar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'veterinar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_id', 'nickname_id'], 'required'],
            [['name_id', 'nickname_id'], 'integer'],
            ['diagnoz', 'string'],
            [['name_id'], 'exist', 'skipOnError' => true, 'targetClass' => Animal::class, 'targetAttribute' => ['name_id' => 'id']],
            [['nickname_id'], 'exist', 'skipOnError' => true, 'targetClass' => Animal::class, 'targetAttribute' => ['nickname_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_id' => 'Названия животного',
            'nickname_id' => 'Имя',
            'diagnoz' => 'Диагноз',
        ];
    }

    /**
     * Gets query for [[Name]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getName()
    {
        return $this->hasOne(Animal::class, ['id' => 'name_id']);
    }

    /**
     * Gets query for [[Nickname]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNickname()
    {
        return $this->hasOne(Animal::class, ['id' => 'nickname_id']);
    }
}
