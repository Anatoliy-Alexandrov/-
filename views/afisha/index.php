
<h1>Афиша</h1>
<?php


use yii\bootstrap5\Html;

foreach ($afisha as $t): ?>

    <div class="card mb-3 border-success border-2"   >
    <div class="row g-0">
        <div class="col-md-4">
            <img src="img/<?= $t->img ?>"   class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title"><?= $t->name ?></h5>
                <p class="card-text"><?= $t->description ?></p>
                <?php
                // Проверяем, авторизован ли пользователь
                if (Yii::$app->user->isGuest) {
                    // Если не авторизован, выводим сообщение
                    echo '<p>Авторизуйтесь, чтобы заказать билеты</p>';
                } else {
                    // Если авторизован, выводим кнопку "Заказать"
                    echo Html::a(
                        'Заказать',
                        ['view', 'id' => $t->id],
                        [
                            'class' => 'btn btn-primary',
                            // Дополнительные атрибуты кнопки, если нужно
                        ]
                    );
                }
                ?>
            </div>
        </div>
    </div>
    </div>
<?php endforeach; ?>
