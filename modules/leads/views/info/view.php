<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\leads\models\LeadInfo */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Lead Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lead-info-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
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
            'create_time',
            'user.username',
            'product.name',
            'leadChannel.name',
            'partner_id',
            'aff_id',
            'leadLanding.name',
            'leadForm.name',
            'source',
            'conv_url:url',
            'ga_cid',
            'utm_medium',
            'utm_term',
            'utm_content',
            'utm_campaign',
            'promocode.promo_name',
            'count_orders',
            'count_sells',
            'total_lessons',
        ],
    ]) ?>

</div>
