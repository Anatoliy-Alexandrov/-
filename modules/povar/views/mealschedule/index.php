<?php

use app\models\Mealschedule;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\MealscheduleSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Расписания';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>

    .mealschedule-index .grid-view td:nth-child {
        width: 0px;
        background-color: #0a53be/* Задайте нужную ширину */
        text-decoration: none;
    }
    .mealschedule-index {
        width: 500px;
        text-decoration: none;
    }
    .mealschedule-index .grid-view td:nth-child(2) {
        width: 50px; /* Задайте нужную ширину */
    }
    .mealschedule-index h1,
    .mealschedule-index th {
        text-decoration: none;
    }

</style>
<div class="mealschedule-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить расписания', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          //  'id',
            'name',
            'time',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Mealschedule $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],


        ],
    ]); ?>


</div>
