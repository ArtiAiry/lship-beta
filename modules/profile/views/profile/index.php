<?php

use app\models\User;

use app\modules\profile\models\Profile;
use app\modules\profile\Module;
use app\widgets\RoleColumn;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\profile\models\ProfileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Module::t('profile','Profiles');

$this->params['breadcrumbs'][] = $this->title;


\app\widgets\CustomBreadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
]);
?>

<?php

$gridId = 'profile-grid';

$this->registerJs(
    "jQuery(document).on('click', '#batch-delete', function (evt) {" .
    "evt.preventDefault();" .
    "var keys = jQuery('#" . $gridId . "').yiiGridView('getSelectedRows');" .
    "if (keys == '') {" .
    "alert('" . Module::t('profile', 'You need to select at least one item.') . "');" .
    "} else {" .
    "if (confirm('" . Module::t('profile', 'Are you sure you want to delete selected items?') . "')) {" .
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


<?php
digitv\bootstrap\widgets\Modal::begin([
    'header'=>'<h4>'.Module::t("profile","Add Profile").'</h4>',
    'id'=>'modal',
    'size'=>'modal-lg',
]);

echo "<div id='modalContent'></div>";

digitv\bootstrap\widgets\Modal::end();

?>

<div class="<?= $gridId ?>">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<!--    <p>-->
<!--        --><?//= Html::a(Module::t('profile','Create Profile'), ['/user/add'], ['class' => 'btn btn-success']) ?>
<!--        --><?//= Html::a(Module::t('profile','Create Default Profile'), ['/user/create'], ['class' => 'btn btn-primary']) ?>
<!--    </p>-->


    <?= Html::a('<i class="fa fa-plus"></i>', ['/user/add'],
        [
//            'value'=>Url::to('/user/add'),
            'class' => 'btn btn-success btn-sm',
            'rel'=>'tooltip',
            'title' => Module::t('profile', 'Create Full Profile')
        ]); ?>

    <?= Html::button('<i class="fa fa-plus"></i>',
        [
            'value'=>Url::to('/user/create'),
            'class' => 'btn btn-primary btn-sm',
            'rel'=>'tooltip',
            'id'=>'modalButton',
            'title' => Module::t('profile', 'Create Default Profile')
        ]); ?>

    <?= Html::a('<i class="fa fa-trash"></i>', ['batch-delete'],
        [
            'class' => 'btn btn-danger btn-sm',
            'id' => 'batch-delete',
            'rel'=>'tooltip',
            'title' => Module::t('profile', 'Delete Selected')
        ]); ?>
    <div class="table-content">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'id' => $gridId,
        'tableOptions' => [
            'class' => 'table table-bordered',
        ],
        'columns' => [
            ['class' => 'yii\grid\CheckboxColumn'],

//            [
//                'attribute' => 'user_id',
////              'filter' => User::find()->select('id','username')->indexBy('username')->column(),
//                'value' => 'user.username',
//            ],


            'user.email:email',
            'fullName',
            'skype',
            'phone',
            'country',

            [
                'label'  => Module::t('profile','Gender'),
                'filter' => Profile::find()->select('id','gender')->indexBy('gender')->column(),
                'value'  => function ($data) {
                    if($data->getGenderValue()==1){
                        return Module::t('profile','Female');
                    }
                    elseif($data->getGenderValue()==2){
                        return Module::t('profile','Male');
                    }else{
                        return Module::t('profile','Not Set');
                    }

                },

            ],

            [
                'label' => Module::t('profile','Lead Infos'),
                'headerOptions' => [
                        'title' => Module::t('profile','Leads\' Information'),
                        'rel'=>'tooltip',
                    ],
                'format' => 'html',
                'value' => function($model) {

                        return Html::a(Module::t('profile','Edit'), ['/leads/info/update', 'id'=>$model->id], ['class' => 'btn btn-primary btn-xs']);


                }
            ],

//            [
//                'label' => Module::t('profile','Lead Info'),
//                'format' => 'html',
//                'class' => '\yii2mod\toggle\ToggleColumn',
//                'value' => function($model) {
//
//                    return Html::a(Module::t('profile','Edit'), ['/leads/info/update', 'id'=>$model->id], ['class' => 'btn btn-primary btn-xs']);
//
//
//                }
//            ],
            [
                'header'=> Module::t('profile','Role'),
                'headerOptions' => ['style' => 'width:10px;',],
                'attribute' => 'role',
                'class' => RoleColumn::className(),
                'filter' => ArrayHelper::map(Yii::$app->authManager->getRoles(), 'name', 'description'),
            ],

            //'city',
            //'ip_address',
            //'age',
            //'gender',
            //'dob',
            //'activity',
            //'interests',
            //'wallet_id',
            //'isRemoved',

            [
                'class' => 'app\widgets\CustomColumn',

                'header' => Module::t('profile','Actions'),
            ],
        ],
    ]); ?>
    </div>
</div>
