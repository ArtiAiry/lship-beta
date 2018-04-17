<?php


use yii\helpers\Html;
use yii\helpers\Url;
?>


<div class="tutors-default-index">
    <h1><?=



        $this->context->action->uniqueId ?></h1>
    <?php

//    var_dump($profiles);

//    $authManager = Yii::$app->authManager;
//
//    var_dump($authManager->getUserIdsByRole('client'));

    $serialColumn = 1;
    ?>

    <?php if(!empty($profiles)): ?>
        <table class="table table-bordered">
            <thead>
            <tr>
                <td>ID</td>
                <td>Teacher</td>
                <td>Email</td>
                <td>Country</td>
                <td>Status</td>
                <td>Role</td>
                <td>Actions</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach($profiles as $profile):?>
                <?php if($profile->user->getRole() == 'teacher'): ?>
                    <tr>
                        <td><?= $profile->id ?></td>
                        <td><?= $profile->first_name . " " . $profile->last_name ?></td>
                        <td><?= $profile->user->email ?></td>
                        <td><?= $profile->country ?></td>
                        <td><?= $profile->user->status ?></td>
                        <td><?= $profile->user->getRole() ?></td>
                        <td>
                            <a href="<?= Url::toRoute(['/profile/view','id'=>$profile->id]);?>" title="View" aria-label="View"><span class="fa fa-eye"></span></a>
                            <a href="<?= Url::toRoute(['/profile/update','id'=>$profile->id]);?>" title="Update" aria-label="Update"><span class="fa fa-pencil"></span></a>
                            <a href="<?= Url::toRoute(['/profile/delete','id'=>$profile->id]);?>" title="Delete" aria-label="Delete" data-confirm="Are you sure you want to delete this item?" data-method="post"><span class="fa fa-trash"></span></a>
                        </td>
                    </tr>
                    <?php endif; ?>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif;?>


</div>
