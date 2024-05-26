<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "raspisanie".
 *
 * @property int $id
 * @property string $startTime
 * @property string $endTime
 * @property string $date
 * @property int $employee_id
 *
 * @property Employee $employee
 */
class Raspisanie extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'raspisanie';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['startTime', 'endTime', 'date', 'employee_id'], 'required'],
            [['employee_id'], 'integer'],
            [['startTime', 'endTime', 'date'], 'string', 'max' => 34],
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
            'startTime' => 'Начало смены',
            'endTime' => 'Конец смены',
            'date' => 'Дата',
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
}
