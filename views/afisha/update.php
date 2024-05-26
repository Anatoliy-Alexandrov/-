<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Afisha $model */

$this->title = 'Update Afisha: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Afishas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="afisha-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
