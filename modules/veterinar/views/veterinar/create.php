<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Veterinar $model */

$this->title = 'Добавть животного';
$this->params['breadcrumbs'][] = ['label' => 'Ветеринар', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="veterinar-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
