<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\FoodSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="food-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'tb_class_id') ?>

    <?= $form->field($model, 'subcategory_id') ?>

    <?= $form->field($model, 'name_id') ?>

    <?= $form->field($model, 'nickname_id') ?>

    <?php // echo $form->field($model, 'breakfast') ?>

    <?php // echo $form->field($model, 'breakfast_quantity') ?>

    <?php // echo $form->field($model, 'lunch') ?>

    <?php // echo $form->field($model, 'lunch_quantity') ?>

    <?php // echo $form->field($model, 'dinner') ?>

    <?php // echo $form->field($model, 'dinner_quantity') ?>

    <?php // echo $form->field($model, 'snack') ?>

    <?php // echo $form->field($model, 'snack_quantity') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
