<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\leads\models\LeadLanding */

$this->title = 'Create Lead Landing';
$this->params['breadcrumbs'][] = ['label' => 'Lead Landings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lead-landing-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
