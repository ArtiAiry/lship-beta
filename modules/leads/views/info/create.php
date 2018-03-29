<?php

use app\modules\leads\Module;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\leads\models\LeadInfo */

$this->title = Module::t('lead-info','Create Lead Info');
$this->params['breadcrumbs'][] = ['label' => Module::t('lead-info','Lead Infos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lead-info-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
