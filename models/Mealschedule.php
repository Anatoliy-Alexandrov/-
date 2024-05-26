<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mealschedule".
 *
 * @property int $id
 * @property string $name
 * @property string $time
 */
class Mealschedule extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mealschedule';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'time'], 'required'],
            [['name', 'time'], 'string', 'max' => 75],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Названия',
            'time' => 'Время',
        ];
    }
}
