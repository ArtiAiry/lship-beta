<?php

use app\modules\product\models\Product;
use app\modules\product\ProductModule;
use yii\grid\CheckboxColumn;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\product\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('product','Products');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<!--    <p>-->
<!--        --><?//= Html::a(Yii::t('product','Create Product'), ['create'], ['class' => 'btn btn-success']) ?>
<!--    </p>-->
<?php

    $gridId = 'product-grid';

    $this->registerJs(
    "jQuery(document).on('click', '#batch-delete', function (evt) {" .
    "evt.preventDefault();" .
    "var keys = jQuery('#" . $gridId . "').yiiGridView('getSelectedRows');" .
    "if (keys == '') {" .
    "alert('" . Yii::t('product', 'You need to select at least one item.') . "');" .
    "} else {" .
    "if (confirm('" . Yii::t('product', 'Are you sure you want to delete selected items?') . "')) {" .
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
                <div class="pull-right">
                    <?= Html::a('<i class="fa fa-plus"></i>', ['create'],
                        [
                            'class' => 'btn btn-primary btn-sm',
                            'title' => Yii::t('product', 'Create Product')
                        ]); ?>
                    <?= Html::a('<i class="fa fa-trash"></i>', ['batch-delete'],
                        [
                            'class' => 'btn btn-danger btn-sm',
                            'id' => 'batch-delete',
                            'title' => 'Delete Selected'
                        ]); ?>
                </div>
            </div>

            </div>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'id' => $gridId,
        'columns' => [
            ['class' => CheckboxColumn::classname()],
//            ['class' => 'yii\grid\SerialColumn'],

            'name',

            [
                'class' => 'app\widgets\CustomColumn',
                'header' => Yii::t('product','Actions'),
            ],
        ],
    ]); ?>
</div>
