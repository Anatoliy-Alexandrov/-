<?php

use app\models\Animal;
use app\models\Beast;
use app\models\Food;
use app\models\Subcategory;
use app\models\TbClass;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\FoodSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Меню';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>

    .food-index {
        text-decoration: none;
    }

    .table-style {
        width: 100%;
        border-collapse: collapse;
        margin: 25px 0;
        font-size: 0.9em;
        font-family: sans-serif;
        min-width: 400px;
        box-shadow: 0 0 20px rgba(92, 245, 104, 0.66);
        text-decoration: none;
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
    .pagination li a,
    .pagination li span {
        background-color: #0d6efd;
        color: white;
        font-size: 20px;
        border-radius: 10px;
        padding: 5px;
        margin-right: 8px;
        text-decoration: none;
    }
    .pagination{
        justify-content: center;
    }
</style>

<div class="food-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить меню', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<h4>Меню на 27.05</h4>
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
            [

                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Food $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }

            ],

        ],
    ]); ?>


</div>


