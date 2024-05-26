<?php

use yii\bootstrap5\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;


?>

<?php $form = ActiveForm::begin([]); ?>

<h3 style="margin-left: 550px">Регистрация</h3>

<div class="row" style="display: flex; align-content: center; align-items: center; justify-content: space-between; margin-left: 450px; ">
    <div class="col-lg-5">

        <?= $form->field($model, 'username')->textInput() ?>

        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= $form->field($model, 'password_repeat')->passwordInput() ?>
        <?= $form->field($model, 'number')->textInput()->widget(MaskedInput::className(), [
            'mask' => '+7 (999) 999-99-99', ]) ?>
        <?= $form->field($model, 'email')->textInput() ?>


        <div class="form-group">
            <div>
                <?= Html::submitButton('Регистрация', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
