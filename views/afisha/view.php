<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Afisha $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Afishas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="afisha-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="table-responsive rounded-3 border border-3 border-success shadow-sm" style="height: 158px; overflow-y: hidden; margin-top: 50px">
        <table class="table table-bordered">
            <tbody>
            <tr class="table-light">
                <th><?= Html::encode('Название') ?></th>
                <td><?= Html::encode($model->name) ?></td>
            </tr>
            <tr class="table-white">
                <th><?= Html::encode('Описание') ?></th>
                <td><?= Html::encode($model->description) ?></td>
            </tr>

            <tr class="table-light">
                <th><?= Html::encode('Купить') ?></th>
                <td>
                    <?php if (Yii::$app->user->isGuest): ?>
                        <p>Для бронирования авторизуйтесь</p>
                    <?php else: ?>
                        <?= Html::beginForm(['/afisha/orders'], 'post', ['class' => 'form-inline']) ?>
                        <?= Html::hiddenInput('id', $model->id) ?>
                        <div class="input-group mb-3" style="width: 400px; border-radius: 10px">
                            <input type="text" class="form-control" placeholder="Количество билетов" name="tickets" value="1" >
                            <div class="input-group-append">
                                <button class="btn btn-success" type="submit">Заказать билеты</button>
                            </div>
                        </div>
                        <?= Html::endForm() ?>
                    <?php endif; ?>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

</div>
