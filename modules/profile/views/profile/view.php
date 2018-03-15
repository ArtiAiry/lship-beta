<?php

use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\profile\models\Profile */

$this->title = $model->user->username;
$this->params['breadcrumbs'][] = ['label' => 'Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Add Wallet', ['/wallet/create', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Add Default Wallet', ['/wallet/add', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
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
                'label'  => 'gender',
                'value'  => function ($data) {
                    if($data->getGenderValue()==1){
                        return 'Female';
                    }
                    elseif($data->getGenderValue()==2){
                        return 'Male';
                    }else{
                        return 'Not Set';
                    }

                }, $model

            ],

            'dob',
            'activity',
            'interests',
        ],
    ]) ?>

    <h3>User's Wallets</h3>

    <?= GridView::widget([
        'dataProvider' => new ActiveDataProvider(['query' => $model->user->getWallet()]),
        'layout' => "{items}\n{pager}",
        'columns' => [
            'id',
            'description',
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
                'header'=>'Actions',
                'class'=>'app\widgets\CustomColumn',
                'controller'=>'/wallet'
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
