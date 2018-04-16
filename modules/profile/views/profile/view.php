<?php

use app\modules\profile\Module;
use app\widgets\RoleColumn;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\profile\models\Profile */



if(Url::previous() == "/profile/index" || Yii::$app->user->can('admin')){

    $this->title = $model->user->username;
    $this->params['breadcrumbs'][] = ['label' => Module::t('profile','Profiles'), 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;

} else {

    $this->title = $model->user->username;
    $this->params['breadcrumbs'][] = $this->title;

}

?>
<div class="profile-view">


    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Module::t('profile','Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Module::t('profile','Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a(Module::t('profile','Add a Wallet'), ['/wallet/add', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([



        'model' => $model,
        'attributes' => [
//            'id',
            'user.username',
            'user.email',
            'skype',
            'first_name',
            'last_name',
            'phone',
            'country',
            'city',
//            'ip_address',
            'age',

            [
                'label'  => Module::t('profile','Gender'),
                'value'  => function ($data) {
                    if($data->getGenderValue()==1){
                        return Module::t('profile','Female');
                    }
                    elseif($data->getGenderValue()==2){
                        return Module::t('profile','Male');
                    }else{
                        return Module::t('profile','Not Set');
                    }

                }, $model

            ],
//            [
//                'label' => Module::t('profile','Role'),
//                'attribute' => 'Role',
//                'filter' => $model->user->getRoleName(),
//            ],

            'dob',
            'activity',
            'interests',
        ],
    ]) ?>



<!--    <pre>-->

<!--    </pre>-->


<!--    --><?//= var_dump([
//        'attribute' => 'role',
//        'class' => RoleColumn::className(),
//        'filter' => ArrayHelper::map(Yii::$app->authManager->getRoles(), 'name', 'description'),
//    ]);?>

    <h3><?= Module::t('profile','User\'s Wallets') ?></h3>
    <div class="table-content">
    <?= GridView::widget([
        'dataProvider' => new ActiveDataProvider(['query' => $model->user->getWallet()]),
        'layout' => "{items}\n{pager}",
        'tableOptions' => [
            'class' => 'table table-bordered'
        ],
        'columns' => [
            'id',
            'description',
            [
                'attribute' => 'isActive',
                'label' => 'status',
                'format' => 'raw',
                'filter' => [
                    0 => 'De-activated',
                    1 => 'Activated',
                ],
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
                'header' => 'Actions',
                'class'    => 'app\widgets\CustomColumn',
                'template' => '{spectate} {edit} {delete}',
                'buttons'  => [
                    'spectate'   => function ($url, $model) {
                        $url = Url::to(['/wallet/spectate', 'id' => $model->id]);
                        return Html::a('<span class="fa fa-eye"></span>', $url, ['title' => Yii::t('app','View'),'rel'=>'tooltip']);
                    },
                    'edit' => function ($url, $model) {
                        $url = Url::to(['/wallet/edit', 'id' => $model->id]);
                        return Html::a('<span class="fa fa-pencil"></span>', $url, ['title' => Yii::t('app','Edit'),'rel'=>'tooltip']);
                    },
                    'delete' => function ($url, $model) {
                        $url = Url::to(['/wallet/delete', 'id' => $model->id]);
                        return Html::a('<span class="fa fa-trash"></span>', $url, [
                            'title'        => Yii::t('app','Delete'),
                            'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                            'data-method'  => 'post',
                            'rel' => 'tooltip',
                        ]);
                    },
                ]
            ],


            [
                'label' => 'Activation',
                'format' => 'html',
                'value' => function($model) {
                    if($model->isActive == 1){
//                        return Html::checkbox('Click me', ['wallet/disactivate'], ['class'=> 'toggle','data-toggle'=> 'switch', 'data-on-color'=>"info" , 'data-off-color'=>'info', 'data-on-text'=>"", 'data-off-text'=>"",'data-pjax' => 0]);
                        return Html::a('De-activate', ['/wallet/disactivate', 'id'=>$model->id], ['class' => 'btn btn-danger btn-xs']);
                    } else {
                        return Html::a('Activate', ['/wallet/activate', 'id'=>$model->id], ['class' => 'btn btn-success btn-xs']);

//                        return 0;
                    }// render your custom button
                }
            ]
        ],
    ]); ?>
    </div>
    <?php echo \yii2mod\comments\widgets\Comment::widget([
        'model' => $model,

        'dataProviderConfig' => [
            'pagination' => [
                'pageSize' => 10
            ],
        ],
        'listViewConfig' => [
            'emptyText' => Yii::t('app', 'No comments found.'),
        ],
    ]); ?>
</div>
