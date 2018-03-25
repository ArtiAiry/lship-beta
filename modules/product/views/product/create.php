<?php

use app\modules\product\Module;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\product\models\Product */

$this->title = Module::t('product','Create Product');
$this->params['breadcrumbs'][] = ['label' => Module::t('product','Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
