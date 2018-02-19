<?php

use yii\db\Migration;

/**
 * Handles the creation of table `order_status_log`.
 */
class m170801_090115_create_order_status_log_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%order_status_log}}', [
            'id' => 'pk',
            'create_time' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'creator_id' => $this->integer(),
            'order_id' => $this->integer(),
            'status' => $this->char(14)->notNull()->defaultValue('Новый'),
            'isRemoved'=> "TINYINT (1) default 1",
//            'status' => "ENUM('Новый','Принят','Невалид','Дубликат','Недозвон','Неинтересно','Потвержден','Отложен','Передумал','Готов к оплате','Непродан','Продажа','Апсейл') NOT NULL DEFAULT 'Новый'",
        ]);

        $this->createIndex(
            'idx-order_status_log-order_id',
            'order_status_log',
            'order_id'
        );

        $this->addForeignKey(
            'fk-order_status_log-order',
            'order_status_log',
            'order_id',
            'user',
            'id',
            'CASCADE',
            'CASCADE'
        );

    }


    /**
     * @inheritdoc
     */

    public function down()
    {

        $this->dropTable('{{%order_status_log}}');
    }
}
