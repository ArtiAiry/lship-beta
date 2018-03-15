<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\wallet\models\Wallet */

$this->title = 'Edit Wallet';
$this->params['breadcrumbs'][] = ['label' => 'Wallets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wallet-edit">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_profile_wallet_form', [
        'model' => $model,
    ]) ?>

</div>