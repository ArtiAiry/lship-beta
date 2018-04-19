<?php

use yii\db\Migration;

/**
 * Handles the creation of table `notification`.
 */
class m170731_101822_create_notification_table extends Migration
{
    /**
     * @inheritdoc
     */
//    public function up()
//    {
//        $this->createTable('{{%notification}}', [
//            'id' => 'pk',
//            'create_time' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP',
//            'creator_id' => $this->integer(),
//            'client_id' => $this->integer(),
//            'text' => $this->text()->notNull(),
//            'status' => $this->char(9)->notNull(),
////            'status' => "ENUM('Новое', 'Выполнено') NOT NULL DEFAULT 'Новое'",
//            'isRemoved'=> "TINYINT (1) default 1",
//        ]);
//
//        $this->createIndex(
//            'idx-notification-client_id',
//            'notification',
//            'client_id'
//        );
//
//        $this->addForeignKey(
//            'fk-notification-client',
//            'notification',
//            'client_id',
//            'user',
//            'id',
//            'CASCADE',
//            'CASCADE'
//
//        );
//    }
//
//    /**
//     * @inheritdoc
//     */
//    public function down()
//    {
//        $this->dropTable('{{%notification}}');
//    }
}
