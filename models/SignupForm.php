<?php

namespace app\models;

use yii\db\ActiveRecord;

class SignupForm extends ActiveRecord
{
    public $username;
    public $password;
    public $password_repeat;
    public $name;
    public $surname;
    public $patronymic;
    public $number;
    public $email;

    public function rules()
    {
        return [
            [ ['username','password', 'number', 'email'], 'required'],
            ['email', 'email'],
            ['password_repeat', 'compare', 'compareAttribute' => 'password']
        ];
    }

    public function attributeLabels()
    {
        return [
            'username'=> 'Логин',
            'password'=> 'Пароль',
            'password_repeat'=> 'Повторите пароль',
           /* 'name' => 'Имя',
            'surname' => 'Фамилия',
            'patronymic' => 'Отчество',*/
            'number' => 'Номер телефона',
            'email' => 'Email',
        ];
    }


    public function signup()
    {
        $user= new User();
        $user->username = $this->username;
       /* $user->name = $this->name;
        $user->surname = $this->surname;
        $user->patronymic = $this->patronymic;*/
        $user->number = $this->number;
        $user->email = $this->email;
        $user->password =\Yii::$app->getSecurity()->generatePasswordHash($this->password);

        return $user->save();
    }
}