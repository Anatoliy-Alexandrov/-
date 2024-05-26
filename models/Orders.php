<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property int|null $user_id
 * @property int $afisha_id

 * @property int $tickets
 *
 * @property Afisha $afisha
 * @property User $user
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['tickets', 'required'],
          //  [['user_id', 'afisha_id', 'tickets'], 'integer'],

          // [['afisha_id'], 'exist', 'skipOnError' => true, 'targetClass' => Afisha::class, 'targetAttribute' => ['afisha_id' => 'id']],
           ['user_id', 'default', 'value' => Yii::$app->user->getId()],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'afisha_id' => 'Afisha ID',

            'tickets' => 'Tickets',
        ];
    }

    /**
     * Gets query for [[Afisha]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAfisha()
    {
        return $this->hasOne(Afisha::class, ['id' => 'afisha_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
