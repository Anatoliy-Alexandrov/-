
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Ticket */
/* @var $afisha app\models\Afisha */

$this->title = 'Купить билет';
?>
<div class="ticket-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success">
            <?= Yii::$app->session->getFlash('success') ?>
        </div>
    <?php endif; ?>

    <?php if (Yii::$app->session->hasFlash('error')): ?>
        <div class="alert alert-danger">
            <?= Yii::$app->session->getFlash('error') ?>
        </div>
    <?php endif; ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name_id')->hiddenInput(['value' => $afisha->id])->label(false) ?>

    <?= $form->field($model, 'user_id')->hiddenInput(['value' => Yii::$app->user->id])->label(false) ?>
    <?= $form->field($ticket, 'name')->textInput() ?>

    <?= $form->field($ticket, 'surname')->textInput() ?>

    <?= $form->field($ticket, 'time')->textInput() ?>
    <?= $form->field($ticket, 'type')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Купить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>