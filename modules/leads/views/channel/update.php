<?php

use app\modules\leads\Module;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\leads\models\LeadChannel */

$this->title = Module::t('lead-channel','Update Lead Channel: ') . $model->name;
$this->params['breadcrumbs'][] = ['label' => Module::t('lead-channel','Lead Channels'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Module::t('lead-channel','Update');
?>
<div class="lead-channel-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
