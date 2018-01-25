<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProfileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Profiles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Profile', ['create'], ['class' => 'btn waves-effect waves-light  cyan darken-2']) ?>
    </p>
    <?php if(!empty($profiles)): ?>
    <table class="table">
        <thead>
        <tr>
            <td>#</td>
            <td>Username</td>
            <td>Skype</td>
            <td>Phone</td>
            <td>Country</td>
            <td>City</td>
            <td>Age</td>
            <td>Gender</td>
            <td>Date of Birth</td>
        </tr>
        </thead>
        <tbody>
        <?php foreach($profiles as $profile):?>
                <tr>
                    <td><?= $profile->id?></td>
                    <td><?= $profile->user->username ?></td>
                    <td><?= $profile->skype ?></td>
                    <td><?= $profile->phone ?></td>
                    <td><?= $profile->country ?></td>
                    <td><?= $profile->city ?></td>
                    <td><?= $profile->age ?></td>
                    <td><?= $profile->gender ?></td>
                    <td><?= $profile->dob ?></td>
                    <td>
                        <a href="<?= Url::toRoute(['profile/view','id'=>$profile->id]);?>" title="View" aria-label="View"><span class="glyphicon glyphicon-eye-open"></span></a>
                        <a href="<?= Url::toRoute(['profile/update','id'=>$profile->id]);?>" title="Update" aria-label="Update"><span class="glyphicon glyphicon-pencil"></span></a>
                        <a href="<?= Url::toRoute(['profile/delete','id'=>$profile->id]);?>" title="Delete" aria-label="Delete" data-confirm="Are you sure you want to delete this item?" data-method="post"><span class="glyphicon glyphicon-trash"></span></a>
                    </td>
                </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php endif; ?>
</div>
