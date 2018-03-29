<?php

use app\modules\leads\Module;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\leads\models\LeadForm */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Module::t('lead-form','Lead Forms'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lead-form-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Module::t('lead-form','Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Module::t('lead-form','Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Module::t('lead-form','Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
        ],
    ]) ?>

</div>
