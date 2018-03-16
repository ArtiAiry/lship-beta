<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\wallet\models\Wallet */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::$app->user->identity->username, 'url' => ['/profile/view', 'id' =>  Yii::$app->user->getId()]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wallet-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Edit', ['edit', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'payoutType.name',
            'bank.name',
            'currency.name',
        ],
    ]) ?>

</div>
