<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "food".
 *
 * @property int $id
 * @property int|null $tb_class_id
 * @property int|null $subcategory_id
 * @property int|null $name_id
 * @property int|null $nickname_id
 * @property string|null $breakfast
 * @property string|null $breakfast_quantity
 * @property string|null $lunch
 * @property string|null $lunch_quantity
 * @property string|null $dinner
 * @property string|null $dinner_quantity
 * @property string|null $snack
 * @property int|null $snack_quantity
 *
 * @property Animal $name
 * @property Animal $nickname
 * @property Subcategory $subcategory
 * @property TbClass $tbClass
 */
class Food extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'food';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tb_class_id', 'subcategory_id', 'name_id', 'nickname_id' ], 'integer'],
            [['breakfast', 'breakfast_quantity', 'lunch', 'lunch_quantity', 'dinner', 'dinner_quantity', 'snack', 'snack_quantity'], 'string', 'max' => 75],
            [['name_id'], 'exist', 'skipOnError' => true, 'targetClass' => Animal::class, 'targetAttribute' => ['name_id' => 'id']],
            [['nickname_id'], 'exist', 'skipOnError' => true, 'targetClass' => Animal::class, 'targetAttribute' => ['nickname_id' => 'id']],
            [['subcategory_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subcategory::class, 'targetAttribute' => ['subcategory_id' => 'id']],
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
            'tb_class_id' => 'Класс',
            'subcategory_id' => 'Подкатегория',
            'name_id' => 'Название животного',
            'nickname_id' => 'Имя',
            'breakfast' => 'Завтрак',
            'breakfast_quantity' => 'Порция',
            'lunch' => 'Обед',
            'lunch_quantity' => 'Порция',
            'dinner' => 'Ужин',
            'dinner_quantity' => 'Порция',
            'snack' => 'Полдник',
            'snack_quantity' => 'Порция',
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

    /**
     * Gets query for [[Subcategory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubcategory()
    {
        return $this->hasOne(Subcategory::class, ['id' => 'subcategory_id']);
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
