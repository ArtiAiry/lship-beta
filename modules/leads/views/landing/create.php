<?php

use app\modules\leads\Module;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\leads\models\LeadLanding */

$this->title = Module::t('lead-landing','Create Lead Landing');
$this->params['breadcrumbs'][] = ['label' => Module::t('lead-landing','Lead Landings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lead-landing-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
