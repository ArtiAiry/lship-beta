<?php

use app\modules\leads\Module;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\leads\models\LeadInfo */

$this->title = Module::t('lead-info','Update Lead Info: ') . $model->id;
$this->params['breadcrumbs'][] = ['label' => Module::t('lead-info','Lead Infos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Module::t('lead-info','Update');
?>
<div class="lead-info-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
