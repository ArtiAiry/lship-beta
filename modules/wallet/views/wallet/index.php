<?php

use app\modules\payout\models\PayoutType;
use app\modules\wallet\models\Bank;
use app\modules\wallet\models\Currency;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\wallet\models\WalletSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Wallets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wallet-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Wallet', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'payout_type_id',
               'filter' => PayoutType::find()->select('id','name')->indexBy('name')->column(),
                'value' => 'payoutType.name',
            ],
            [
                'attribute' => 'bank_id',
                 'filter' => Bank::find()->select('id','name')->indexBy('name')->column(),
                'value' => 'bank.name',
            ],
            [
                'attribute' => 'currency_id',
                  'filter' => Currency::find()->select('id','name')->indexBy('name')->column(),
                'value' => 'currency.name',
            ],

            [
                'class' => 'app\widgets\CustomColumn',
                'header' => 'Actions',
            ],
        ],
    ]); ?>
</div>
