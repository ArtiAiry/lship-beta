<?php

use app\modules\payout\models\PayoutType;
use app\modules\wallet\models\Bank;
use app\modules\wallet\models\Currency;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;

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
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => [
            'class' => 'table table-striped table-bordered'
        ],
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
                /**
                 * Название поля модели
                 */
                'attribute' => 'isActive',
                'label' => 'status',
                /**
                 * Формат вывода.
                 * В этом случае мы отображает данные, как передали.
                 * По умолчанию все данные прогоняются через Html::encode()
                 */
                'format' => 'raw',
                /**
                 * Переопределяем отображение фильтра.
                 * Задаем выпадающий список с заданными значениями вместо поля для ввода
                 */
                'filter' => [
                    0 => 'De-activated',
                    1 => 'Activated',
                ],
                /**
                 * Переопределяем отображение самих данных.
                 * Вместо 1 или 0 выводим Yes или No соответственно.
                 * Попутно оборачиваем результат в span с нужным классом
                 */
                'value' => function ($model, $key, $index, $column) {
                    $active = $model->{$column->attribute} === 1;
                    return \yii\helpers\Html::tag(

                        'span',
                        $active ? 'Activated' : 'De-Activated',


                        [
                            'class' => 'alert alert-' . ($active ? 'success' : 'danger'),

                        ]

                    );
                },
            ],
            [
                'class' => 'app\widgets\CustomColumn',
                'header' => 'Actions',
            ],

//            [
//                'class' => 'app\widgets\CustomColumn',
//                'header' => 'Actions',
//            'template' => '{view} {update} {delete} {myButton}',  // the default buttons + your custom button
//            'buttons' => [
//                'myButton' => function($url, $model, $key) {
//                    if($model->isActive == 1){
////                        return Html::checkbox('Click me', ['wallet/disactivate'], ['class'=> 'toggle','data-toggle'=> 'switch', 'data-on-color'=>"info" , 'data-off-color'=>'info', 'data-on-text'=>"", 'data-off-text'=>"",'data-pjax' => 0]);
//                        return Html::a('De-activate', ['wallet/disactivate', 'id'=>$model->id], ['class' => 'btn btn-danger btn-xs', 'data-pjax' => 0]);
//                    } else {
//                     return Html::a('Activate', ['wallet/activate', 'id'=>$model->id], ['class' => 'btn btn-success btn-xs', 'data-pjax' => 0]);
//
////                        return 0;
//                    }// render your custom button
//                }
//            ]
//        ],

            [
                'label' => 'Activation',
                'format' => 'html',
                'value' => function($model) {
                    if($model->isActive == 1){
                        return Html::a('De-activate', ['wallet/disactivate', 'id'=>$model->id], ['class' => 'btn btn-danger btn-xs']);
                    } else {
                        return Html::a('Activate', ['wallet/activate', 'id'=>$model->id], ['class' => 'btn btn-success btn-xs']);

                    }
                }
            ]

    ]
    ]); ?>
    <?php Pjax::end(); ?>
</div>
