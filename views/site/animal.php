<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>
<h2>Подробная информация</h2>
<div class="card mb-3" style=" border: 2px solid #1647ff; margin-top: 10px">
    <div class="row g-0">
        <div class="col-md-6">
            <img src="img/<?php echo $model->img ?>" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-6">
            <div class="card-body">
                <h4 class="card-title"><?= Html::encode($model->name) ?></h4>
                <p class="card-text"><?= Html::encode($model->description) ?></p>
                <p class="card-text"><small class="font-monospace">Класс: <?php // Html::encode($model->class) ?></small></p>
                <p class="card-text"><small class="font-monospace">Отряд: <?= Html::encode($model->otryad) ?></small></p>
                <p><?= Html::a('Вернуться к списку', Url::to(['site/beast']), ['class' => 'btn btn-primary']) ?></p>
            </div>
        </div>
    </div>
</div>
<h3>Наши животные</h3>
<div class="row" style="margin-top: 20px;">
    <?php foreach ($animalNames as $animalName): ?>
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?= Html::encode($animalName->name) ?> <?= Html::encode($animalName->nickname) ?></h5>
                <p class="card-text"><?= Html::encode($animalName->description) ?></p>
                <p class="card-text">Появился в зоопарке: <?= Html::encode($animalName->year) ?></p>

            </div>
        </div>
    </div>
    <?php endforeach; ?>

</div>




