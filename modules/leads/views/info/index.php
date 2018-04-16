<?php

use app\modules\leads\models\LeadChannel;
use app\modules\leads\models\LeadForm;
use app\modules\leads\models\LeadLanding;
use app\modules\leads\Module;
use app\modules\product\models\Product;
use app\modules\promocode\models\Promocode;
use kartik\date\DatePicker;
use yii\bootstrap\Modal;
use yii\grid\CheckboxColumn;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\leads\models\LeadInfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Module::t('lead-info','Lead Infos');
$this->params['breadcrumbs'][] = $this->title;
?>
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
<!--        --><?//= Html::a('Create Lead Info', ['create'], ['class' => 'btn btn-success']) ?>
<!--        --><?//= Html::a('Create Channel', ['/leads/channel/create'], ['class' => 'btn btn-success']) ?>
<!--        --><?//= Html::a('Create Form', ['/leads/form/create'], ['class' => 'btn btn-success']) ?>
<!--        --><?//= Html::a('Create Landing', ['/leads/landing/create'], ['class' => 'btn btn-success']) ?>
<!--        --><?//= Html::button(Module::t('lead-info','Create Lead Info'), ['value'=>Url::to('create'), 'class' => 'btn btn-success', 'id'=>'modalButton']); ?>
<!--        --><?//= Html::button(Module::t('lead-info','Create Channel'), ['value'=>Url::to('/leads/channel/create'), 'class' => 'btn btn-success', 'id'=>'modalButton1']); ?>
<!--        --><?//= Html::button(Module::t('lead-info','Create Form'), ['value'=>Url::to('/leads/form/create'), 'class' => 'btn btn-success', 'id'=>'modalButton2']); ?>
<!--        --><?//= Html::button(Module::t('lead-info','Create Landing'), ['value'=>Url::to('/leads/landing/create'), 'class' => 'btn btn-success', 'id'=>'modalButton3']); ?>


    </p>

    <!-- modal structure beginning (for create-action buttons)-->

    <?php
    digitv\bootstrap\widgets\Modal::begin([
        'header'=>'<h4>'.Module::t("lead-info","Add a lead").'</h4>',
        'id'=>'modal',
        'size'=>'modal-lg',
    ]);

    echo "<div id='modalContent'></div>";

    digitv\bootstrap\widgets\Modal::end();

    ?>
<!---->
    <?php
    digitv\bootstrap\widgets\Modal::begin([
        'header'=>'<h4>'.Module::t("lead-channel","Add a Channel").'</h4>',
        'id'=>'modal1',
        'size'=>'modal-lg',
    ]);

    echo "<div id='modalContent1'></div>";

    digitv\bootstrap\widgets\Modal::end();

    ?>

    <?php
    digitv\bootstrap\widgets\Modal::begin([
        'header'=>'<h4>'.Module::t("lead-form","Add a Form").'</h4>',
        'id'=>'modal2',
        'size'=>'modal-lg',
    ]);

    echo "<div id='modalContent2'></div>";

    digitv\bootstrap\widgets\Modal::end();
    ?>

    <?php
    digitv\bootstrap\widgets\Modal::begin([
        'header'=>'<h4>'.Module::t("lead-landing","Add a Landing").'</h4>',
        'id'=>'modal3',
        'size'=>'modal-lg',
    ]);

    echo "<div id='modalContent3'></div>";

    digitv\bootstrap\widgets\Modal::end();

    ?>




    <!-- modal structure ending (for create-action buttons)-->

<?php

    $gridId = 'lead-grid';

    $this->registerJs(
    "jQuery(document).on('click', '#batch-delete', function (evt) {" .
    "evt.preventDefault();" .
    "var keys = jQuery('#" . $gridId . "').yiiGridView('getSelectedRows');" .
    "if (keys == '') {" .
    "alert('" . Module::t('lead-info', 'You need to select at least one item.') . "');" .
    "} else {" .
    "if (confirm('" . Module::t('lead-info', 'Are you sure you want to delete selected items?') . "')) {" .
    "jQuery.ajax({" .
    "type: 'POST'," .
    "url: jQuery(this).attr('href')," .
    "data: {ids: keys}" .
    "});" .
    "}" .
    "}" .
    "});"
    );

    ?>

<div class="<?= $gridId ?>">
    <div class="box box-default">
        <div class="box-header">
                <?= Html::button('<i class="nc-icon nc-chart-pie-35"></i>',
                    [
                        'id'=>'modalButton',
                        'value'=>Url::to('create'),
                        'class' => 'btn btn-primary btn-sm',
                        'rel'=>'tooltip',
                        'title' => Module::t('lead-info', 'Create Lead Info')
                    ]); ?>
                <?= Html::button('<i class="fa fa-bar-chart-o"></i>',
                    [
                        'id'=>'modalButton1',
                        'value'=>Url::to('/leads/channel/create'),
                        'class' => 'btn btn-primary btn-sm',
                        'rel'=>'tooltip',
                        'title' => Module::t('lead-info', 'Create Channel')
                    ]); ?>
                <?= Html::button('<i class="fa fa-address-card-o"></i>',
                    [
                        'id'=>'modalButton2',
                        'value'=>Url::to('/leads/form/create'),
                        'class' => 'btn btn-primary btn-sm',
                        'rel'=>'tooltip',
                        'title' => Module::t('lead-info', 'Create Form')
                    ]); ?>
                <?= Html::button('<i class="fa fa-area-chart"></i>',
                    [
                        'id'=>'modalButton3',
                        'value'=>Url::to('/leads/landing/create'),
                        'class' => 'btn btn-primary btn-sm',
                        'rel'=>'tooltip',
                        'title' => Module::t('lead-info', 'Create Landing')
                    ]); ?>
                <?= Html::a('<i class="fa fa-trash"></i>', ['batch-delete'],
                    [
                        'class' => 'btn btn-danger btn-sm',
                        'id' => 'batch-delete',
                        'rel'=>'tooltip',
                        'title' => Module::t('lead-info', 'Delete Selected')
                    ]); ?>
        </div>
    </div>





<!--    style="max-width: 100%; overflow: auto;"-->

<div class="table-content">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'id' => $gridId,
        'tableOptions' => [
            'class' => 'table table-bordered',
        ],
        'columns' => [
                [
                    'class' => CheckboxColumn::classname(),
//                    'headerOptions' => ['style' => 'width:10px;'],
                ],
            'create_time',

//            [
//                'filter' =>
//                    Html::tag(
//                        'div',
//                        Html::tag('div', Html::activeTextInput($searchModel, 'date_from', ['class' => 'form-control datetimepicker', 'id' => 'datetimepicker']), ['class' => 'col-md-6']) .
//                        Html::tag('div', Html::activeTextInput($searchModel, 'date_to', ['class' => 'form-control datetimepicker','id' => 'datetimepicker']), ['class' => 'col-md-6']),
//                        ['class' => 'row']
//                    ),
//                'attribute' => 'create_time',
//                'format' => 'date',
//            ],

            [
                'attribute' => 'user_id',
                'value' => 'user.username',
            ],
            [
                'attribute' =>'product_id',
                'filter' => Product::find()->select('id','name')->indexBy('name')->column(),
                'value' => 'product.name',
            ],
            [
                'attribute' => 'lead_channel_id',
                'filter' => LeadChannel::find()->select('id','name')->indexBy('name')->column(),
                'value' => 'leadChannel.name',
            ],
            [
                'attribute' => 'lead_landing_id',
                'filter' => LeadLanding::find()->select('id','name')->indexBy('name')->column(),
                'value' => 'leadLanding.name',
            ],
            [
                'attribute' => 'lead_form_id',
                'filter' => LeadForm::find()->select('id','name')->indexBy('name')->column(),
                'value' => 'leadForm.name',
            ],
            [
                'attribute' => 'promocode_id',
                'filter' => Promocode::find()->select('id','promo_name')->indexBy('promo_name')->column(),
                'value' => 'promocode.promo_name',
            ],

//            'lead_channel_id',
            // 'partner_id',
            // 'aff_id',
//            'lead_landing_id',
//            'lead_form_id',
            // 'source',
            // 'conv_url:url',
            // 'ga_cid',
            // 'utm_medium',
            // 'utm_term',
            // 'utm_content',
            // 'utm_campaign',
            // 'promocode_id',
            // 'count_orders',
            // 'count_sells',
            // 'total_lessons',

            [
                'class' => 'app\widgets\CustomColumn',
                'header' => Module::t('lead-info','Actions'),
            ],
        ],
    ]);

//    Modal::begin([
//        'id'=>'pModal',
//        'size'=>'modal-lg',
//    ]);
//    Modal::end();
//    ?>
</div>
</div>