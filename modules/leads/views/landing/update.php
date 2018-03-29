<?php

use app\modules\leads\Module;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\leads\models\LeadLanding */

$this->title = Module::t('lead-landing','Update Lead Landing: ') . $model->name;
$this->params['breadcrumbs'][] = ['label' => Module::t('lead-landing','Lead Landings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Module::t('lead-landing','Update');
?>
<div class="lead-landing-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
