<?php use yii\bootstrap5\Html;
use yii\grid\GridView;
use yii\helpers\Url;
?>

<style>
    .card-title a {
        text-decoration: none; /* Убирает подчеркивание у ссылок */
    }
    .list-group-item  a{
        text-decoration: none;
    }
    .card-img-top {
        transition: transform 0.4s;
    }

    .zoom:hover {
        transform: scale(1.1);
    }
</style>
<script>
    $(document).ready(function() {
        $('.zoom').hover(function() {
            $(this).css('transform', 'scale(1.1)');
        }, function() {
            $(this).css('transform', 'scale(1)');
        });
    });
</script>
<h1>Все животные</h1>

<div class="row row-cols-1 row-cols-md-3 g-4">
    <div class="card" style="width: 13rem; height: 18rem">
        <div class="card-header">
            <h5 style="margin-left: 15px">Сортировка</h5>
        </div>
        <ul class="list-group list-group-flush">

            <li class="list-group-item"><?= Html::a('Млекопитающие', ['beast', 'tb_class_id' => 1]);?></li>
            <li class="list-group-item"><?= Html::a('Птицы', ['beast', 'tb_class_id' => 2]);?></li>
            <li class="list-group-item"><?= Html::a('Рыбы', ['beast', 'tb_class_id' => 3]);?></li>
            <li class="list-group-item"><?= Html::a('Паукообразные', ['beast', 'tb_class_id' => 4]);?></li>
            <li class="list-group-item"><?= Html::a('Пресмыкающиеся', ['beast', 'tb_class_id' => 5]);?></li>
        </ul>
    </div>
    <?php foreach ($beast as $t): ?>

        <div class="col">
            <div class="card">
                <a href="<?= Url::to(['site/animal', 'id' => $t->id]) ?>">
                    <img src="img/<?php echo $t->img ?>" style="height: 280px; object-fit: cover;" class="card-img-top zoom" alt="...">
                </a>
                <div class="card-body">
                    <h5 class="card-title"><?php echo '<p>' . Html::a($t->name, Url::to(['site/animal', 'id' => $t->id])) . '</p>'; ?></h5>
                    <p class="card-text"><?= \yii\helpers\StringHelper::truncateWords(\yii\helpers\Html::encode($t->description), 25) ?></p>
                </div>
            </div>
        </div>

    <?php endforeach; ?>
</div>

