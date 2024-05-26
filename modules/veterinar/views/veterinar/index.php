<?php

use app\models\Animal;
use app\models\Veterinar;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\VeterinarSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Ветеринар';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="veterinar-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить животного', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
           // 'name_id',
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
            'diagnoz',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Veterinar $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
