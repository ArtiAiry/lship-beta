<?php

use yii\db\Migration;

/**
 * Class m180222_123232_rbac_init
 */
class m180222_123232_rbac_init extends Migration
{
    /**
     * {@inheritdoc}
     */
//    public function safeUp()
//    {
//
//
//    }
//
//    /**
//     * {@inheritdoc}
//     */
//    public function safeDown()
//    {
//        echo "m180222_123232_rbac_init cannot be reverted.\n";
//
//        return false;
//    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $auth = Yii::$app->authManager;

        $manageWallets = $auth->createPermission('manageWallets');
        $manageWallets->description = 'Manage wallets';
        $auth->add($manageWallets);

        $manageUsers = $auth->createPermission('manageUsers');
        $manageUsers->description = 'Manage users';
        $auth->add($manageUsers);

        $banking = $auth->createRole('banking');
        $banking->description = 'Banking';
        $auth->add($banking);
        $auth->addChild($banking, $manageWallets);

        $admin = $auth->createRole('admin');
        $admin->description = 'Administrator';
        $auth->add($admin);
        $auth->addChild($admin, $banking);
        $auth->addChild($admin, $manageUsers);
    }

    public function down()
    {
        Yii::$app->authManager->removeAll();
    }

}
