<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\leads\models\LeadChannel */

$this->title = 'Create Lead Channel';
$this->params['breadcrumbs'][] = ['label' => 'Lead Channels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lead-channel-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
