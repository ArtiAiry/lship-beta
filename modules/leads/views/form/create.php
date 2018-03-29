<?php

use app\modules\leads\Module;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\leads\models\LeadForm */

$this->title = Module::t('lead-form','Create Lead Form');
$this->params['breadcrumbs'][] = ['label' => Module::t('lead-form','Lead Forms'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lead-form-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
