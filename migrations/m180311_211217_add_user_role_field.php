<?php

use yii\db\Migration;

/**
 * Class m180311_211217_add_user_role_field
 */
class m180311_211217_add_user_role_field extends Migration
{
    /**
     * {@inheritdoc}
     */
//    public function safeUp()
//    {
//
//    }
//
//    /**
//     * {@inheritdoc}
//     */
//    public function safeDown()
//    {
//        echo "m180311_211217_add_user_role_field cannot be reverted.\n";
//
//        return false;
//    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->addColumn('{{%user}}', 'role', $this->string(64));

        $this->update('{{%user}}', ['role' => 'user']);
    }

    public function down()
    {
        $this->dropColumn('{{%user}}', 'role');
    }

}
