<h3> Расписание экскурсий</h3>
<?php use yii\bootstrap5\Html;
use yii\helpers\Url;

foreach ($afisha as $t): ?>

<div class="card mb-3" " >
    <div class="row g-0">
        <div class="col-md-4">
            <img src="img/<?= $t->img ?>"   class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title"><?= $t->name ?></h5>
                <p class="card-text"><?= $t->description ?></p>
                <a href="<?php   if (Yii::$app->user->isGuest) return 'Авторизуйтесь, чтобы бронировать билеты';  return Html::a('ЗАказать билеты', ['view', 'id'=>$model->id]) ; ?>" class="btn btn-primary">Перейти куда-нибудь</a>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

