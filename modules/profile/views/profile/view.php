<?php

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
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'user.username',
            'user.email',
            'skype',
            'phone',
            'country',
            'city',
//            'ip_address',
            'age',
            'gender',
            'dob',
            'activity',
            'interests',
            'wallet_id',
        ],
    ]) ?>

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
