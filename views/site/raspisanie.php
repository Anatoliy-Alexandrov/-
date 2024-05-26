<?php

use app\models\Raspisanie;
use yii\bootstrap5\Html;
use yii\grid\ActionColumn;
use yii\helpers\Url;

use yii\grid\GridView;

?>
<h1>Расписание</h1>
<div style="display: flex; ">



<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'summary' => '',
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
            },
            'visibleButtons' =>[
                    'delete' => false,
                'update' => false,
            ],
        ],

    ],
]); ?>


</div>
