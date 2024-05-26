<?php

use app\models\Animal;
use app\models\Beast;
use app\models\Subcategory;
use app\models\TbClass;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Food $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="food-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php  //$form->field($model, 'tb_class_id')->textInput() ?>
    <?php echo $form->field($model, 'tb_class_id')->dropdownList(
        Tbclass::find()->select(['name', 'id'])->indexBy('id')->column(),
        ['prompt'=>'Выбрать Класс']
    );?>

    <?php  // $form->field($model, 'subcategory_id')->textInput() ?>

    <?php echo $form->field($model, 'subcategory_id')->dropdownList(
        subcategory::find()->select(['name', 'id'])->indexBy('id')->column(),
        ['prompt'=>'Выбрать Класс']
    );?>

    <?php  // $form->field($model, 'name_id')->textInput() ?>

    <?php echo $form->field($model, 'name_id')->dropdownList(
        Beast::find()->select(['name', 'id'])->indexBy('id')->column(),
        ['prompt'=>'Выбрать Класс']
    );?>

    <?php  // $form->field($model, 'nickname_id')->textInput() ?>

    <?php echo $form->field($model, 'nickname_id')->dropdownList(
        Animal::find()->select(['nickname', 'id'])->indexBy('id')->column(),
        ['prompt'=>'Выбрать Класс']
    );?>

    <?= $form->field($model, 'breakfast')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'breakfast_quantity')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lunch')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lunch_quantity')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dinner')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dinner_quantity')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'snack')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'snack_quantity')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
