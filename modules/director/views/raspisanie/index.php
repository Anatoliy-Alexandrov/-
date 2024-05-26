<?php

use app\models\Raspisanie;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\RaspisanieSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Расписание';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="raspisanie-index">


<div style="display: flex; ">

    <h1><?= Html::encode($this->title) ?></h1>

    <p style="margin-top: 10px; margin-left: 20px">
        <?= Html::a('Добавить расписания', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

</div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            //'employee_id',
            [
                'attribute' => 'employee_id',
                'value' => function ($model) {
                    // Предполагается, что у вас есть связь 'employee' в модели Raspisanie
                    // и связь 'position' в модели Employee
                    $employee = $model->employee;
                    $position = $employee->position->name; // Получаем название должности
                    return $employee->surname . ' (' . $position . ')'; // Выводим фамилию и должность
                },
                'label' => 'Сотрудник (Должность)',
            ],
            'date',
            'startTime',
            'endTime',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Raspisanie $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],

        ],
    ]); ?>


</div>
