<?php

use app\models\Animal;
use app\models\Food;
use app\models\Mealschedule;
use app\models\Subcategory;
use app\models\TbClass;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

?>
<style>


    .table-style {
        width: 100%;
        border-collapse: collapse;
        margin: 25px 0;
        font-size: 0.9em;
        font-family: sans-serif;
        min-width: 400px;
        box-shadow: 0 0 20px rgba(71, 255, 85, 0.66);
        text-decoration: none;
        /* Добавляем обводку */
        border: 1px solid #009879; /* Изменяем цвет на зеленый */
    }

    .table-style thead tr {
        background-color: #009879;
        color: #ffffff;
        text-align: left;
        text-decoration: none;
    }

    .table-style th,
    .table-style td {
        padding: 12px 15px;
    }

    .table-style tbody tr {
        border-bottom: 1px solid #009879;
    }

    .table-style tbody tr:nth-of-type(even) {
        background-color: #f3f3f3;
    }

    .table-style tbody tr:last-of-type {
        border-bottom: 2px solid #009879;
    }

    .table-style tbody tr.active-row {
        font-weight: bold;
        color: #009879;
    }
    .yii-grid-view .sort-link {
        text-decoration: none; /* Убирает подчеркивание */
    }

    /* Или если вы хотите убрать подчеркивание только при наведении */
    .yii-grid-view .sort-link:hover {
        text-decoration: none; /* Убирает подчеркивание при наведении */
    }
</style>
<h1> Меню</h1>
<div class="food-index">



    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => ['class' => 'table-style'],
        'summary' => '',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            [
                'attribute' => 'tb_class_id',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->tbClass ? $model->tbClass->name : null; // Предполагается, что у вас есть связь getName в модели Food
                },
                'filter' => ArrayHelper::map(TbClass::class::find()->asArray()->all(), 'id', 'name'), // Фильтр со списком имен
            ],
            [
                'attribute' => 'subcategory_id',
                'value' => function ($model) {
                    return $model->subcategory ? $model->subcategory->name : null; // Используйте связь getSubcategory в модели Food
                },
                'filter' => ArrayHelper::map(Subcategory::find()->asArray()->all(), 'id', 'name'),

            ],

            [
                'attribute' => 'name_id',
                'value' => function ($model) {
                    return $model->name ? $model->name->name : null; // Предполагается, что у вас есть связь getName в модели Food
                },
                'filter' => ArrayHelper::map(Animal::find()->asArray()->all(), 'id', 'name'), // Фильтр со списком имен
            ],
            [
                'attribute' => 'nickname_id',
                'value' => function ($model) {
                    return $model->nickname ? $model->nickname->nickname : null; // Предполагается, что у вас есть связь getNickname в модели Food
                },
                'filter' => ArrayHelper::map(Animal::find()->asArray()->all(), 'id', 'nickname'), // Фильтр со списком прозвищ
            ],
            'breakfast',
            'breakfast_quantity',
            'lunch',
            'lunch_quantity',
            'dinner',
            'dinner_quantity',
            'snack',
            'snack_quantity',


        ],
    ]); ?>


</div>

<div class="container" style="margin-top: 50px">
    <h3 style="padding-top: 30px">Расписание</h3>
    <div class="row">
        <div class="col-md-12">

            <table class="table table-striped table-bordered">

                <thead>
                <tr>
                    <th>ID</th>
                    <th>Имя</th>
                    <th>Время</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($rasp as $item): ?>
                    <tr>
                        <td><?= $item->id ?></td>
                        <td><?= $item->name ?></td>
                        <td><?= $item->time ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
