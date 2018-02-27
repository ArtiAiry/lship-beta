<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\orders\models\OrderInfo */

$this->title = 'Update Order Info: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Order Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="order-info-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
