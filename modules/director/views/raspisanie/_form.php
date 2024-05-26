<?php

use app\models\Employee;
use app\models\Position;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Raspisanie $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="raspisanie-form" style="width: 30%; margin: auto;">

    <?php $form = ActiveForm::begin(); ?>


    <?php /*echo $form->field($model, 'employee_id')->dropdownList(
        \app\models\Employee::find()->select(['surname', 'id'])->indexBy('id')->column(),
        ['prompt'=>'Выбрать Класс']
    );*/?>

    <?php $employees = Employee::find()
        ->with('position') // предполагается, что у вас есть связь 'position' в модели Employee
        ->all();

    // Создаем массив для dropdownList
    $items = ArrayHelper::map($employees, 'id', function ($employee) {
        // Получаем название должности по position_id
        $positionName = Position::findOne($employee->position_id)->name;
        return $employee->surname . ' (' . $positionName . ')';
    });

    // Выводим dropdownList
    echo $form->field($model, 'employee_id')->dropdownList(
        $items,
        ['prompt' => 'Выбрать Сотрудника']
    ); ?>

    <?= $form->field($model, 'date')->input('date', ['maxlength' => true]) ?>

    <?= $form->field($model, 'startTime')->input('time', ['maxlength' => true]) ?>

    <?= $form->field($model, 'endTime')->input('time', ['maxlength' => true]) ?>



    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
