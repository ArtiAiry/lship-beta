<?php

use app\modules\profile\Module;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $profile app\modules\profile\models\Profile */
/* @var $user app\models\User */

$this->title = Module::t('profile','Update Profile: ') . $profile->user->username;
$this->params['breadcrumbs'][] = ['label' => Module::t('profile','Profiles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $profile->user->username, 'url' => ['view', 'id' => $profile->id]];
$this->params['breadcrumbs'][] = Module::t('profile','Update');
?>
<div class="profile-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'user' => $user,
        'profile' => $profile,
    ]) ?>

</div>
