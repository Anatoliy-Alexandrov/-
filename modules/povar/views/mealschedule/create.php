<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Mealschedule $model */

$this->title = 'Добавить расписания';
$this->params['breadcrumbs'][] = ['label' => 'Расписания', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mealschedule-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
