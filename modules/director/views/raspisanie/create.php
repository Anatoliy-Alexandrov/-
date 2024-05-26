<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Raspisanie $model */

$this->title = 'Добавить расписание';
$this->params['breadcrumbs'][] = ['label' => 'Расписание', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="raspisanie-create" >

    <h1 style="width: 40%; margin: auto; margin-right: 335px"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
