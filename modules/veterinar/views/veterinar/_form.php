<?php

use app\models\Animal;
use app\models\Beast;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Veterinar $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="veterinar-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'name_id')->dropdownList(
        Animal::find()->select(['name', 'id'])->indexBy('id')->column(),
        ['prompt'=>'Выбрать Класс']
    );?>

    <?php  // $form->field($model, 'nickname_id')->textInput() ?>

    <?php echo $form->field($model, 'nickname_id')->dropdownList(
        Animal::find()->select(['nickname', 'id'])->indexBy('id')->column(),
        ['prompt'=>'Выбрать Класс']
    );?>

    <?= $form->field($model, 'diagnoz')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
