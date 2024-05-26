<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ticket".
 *
 * @property int $id
 * @property int $name_id
 * @property string $name
 * @property string $surname

 * @property string $time
 * @property string $type
 *  @property string $user_id
 *
 * @property User $email
 * @property Afisha $name0
 * @property User $number
 */
class Ticket extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ticket';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_id', 'name', 'surname', 'time', 'type'], 'required'],
            [['name_id'], 'integer'],
            [['name', 'surname', 'time', 'type'], 'string', 'max' => 75],
            [['name_id'], 'exist', 'skipOnError' => true, 'targetClass' => Afisha::class, 'targetAttribute' => ['name_id' => 'id']],
            [['user_id'], 'integer'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_id' => 'Name ID',
            'name' => 'Name',
            'surname' => 'Surname',

            'time' => 'Time',
            'type' => 'Type',
        ];
    }

    /**
     * Gets query for [[Email]].
     *
     * @return \yii\db\ActiveQuery
     */


    /**
     * Gets query for [[Name0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getName0()
    {
        return $this->hasOne(Afisha::class, ['id' => 'name_id']);
    }

    /**
     * Gets query for [[Number]].
     *
     * @return \yii\db\ActiveQuery
     */

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
