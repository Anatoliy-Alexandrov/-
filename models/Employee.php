<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $patronomic
 * @property string $year
 * @property string $number_ph
 *
 * @property Raspisanie[] $raspisanies
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'patronomic', 'year', 'number_ph'], 'required'],
            [['name', 'surname', 'patronomic', 'year'], 'string', 'max' => 75],
            [['number_ph'], 'string', 'max' => 30],
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
            'patronomic' => 'Patronomic',
            'year' => 'Year',
            'number_ph' => 'Number Ph',
        ];
    }

    /**
     * Gets query for [[Raspisanies]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRaspisanies()
    {
        return $this->hasMany(Raspisanie::class, ['employee_id' => 'id']);
    }
    public function getPosition()
    {
        // 'Position' - это имя класса модели для таблицы 'position'
        // 'position_id' - это имя поля в таблице 'employee', которое связано с 'id' в таблице 'position'
        return $this->hasOne(Position::className(), ['id' => 'position_id']);
    }
}
