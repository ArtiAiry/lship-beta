<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\leads\models\LeadInfo */

$this->title = 'Create Lead Info';
$this->params['breadcrumbs'][] = ['label' => 'Lead Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lead-info-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
