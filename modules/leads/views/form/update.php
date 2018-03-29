<?php

use app\modules\leads\Module;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\leads\models\LeadForm */

$this->title = Module::t('lead-form','Update Lead Form: ') . $model->name;
$this->params['breadcrumbs'][] = ['label' => Module::t('lead-form','Lead Forms'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Module::t('lead-form','Update');
?>
<div class="lead-form-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
