<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\wallet\models\Wallet */

$this->title = 'Add Wallet';
$this->params['breadcrumbs'][] = ['label' => Yii::$app->user->identity->username, 'url' => ['/profile/view', 'id' =>  Yii::$app->user->getId()]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wallet-add">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_profile_wallet_form', [
        'model' => $model,
    ]) ?>

</div>