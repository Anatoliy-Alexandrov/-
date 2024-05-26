<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "afisha".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int|null $tickets
 * @property string $img
 * @property int $employee_id
 *
 * @property Employee $employee
 * @property Orders[] $orders
 */
class Afisha extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'afisha';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'img', 'employee_id'], 'required'],
            [['description'], 'string'],
            [['tickets', 'employee_id'], 'integer'],
            [['name', 'img'], 'string', 'max' => 75],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::class, 'targetAttribute' => ['employee_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'description' => 'Описание',
            'tickets' => 'Билеты',
            'img' => 'Img',
            'employee_id' => 'Сотрудник',
        ];
    }

    /**
     * Gets query for [[Employee]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(Employee::class, ['id' => 'employee_id']);
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::class, ['afisha_id' => 'id']);
    }
}
