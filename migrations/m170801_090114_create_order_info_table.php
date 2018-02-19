<?php

use yii\db\Migration;

/**
 * Handles the creation of table `order_info`.
 */
class m170801_090114_create_order_info_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%order_info}}', [
            'id' => 'pk',
            'create_time' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'client_id' => $this->integer()->notNull(),
            'product_id' => $this->integer()->notNull(),
            'current_level' => $this->integer(),
            'course_id' => $this->integer()->notNull(),
            'tutor_type_id' => $this->integer()->notNull(),
            'tutor_experience' => $this->integer(),
            'connect_method' => $this->integer(),
            'connect_time' => $this->integer(),
            'frequence' => $this->integer(),
            'free_days' => 'json',
            'free_times' => 'json',
            'goal' => $this->integer(),
            'demo_total' => $this->integer(),
            'demo_like' => $this->integer(),
            'demo_dislike' => $this->integer(),
            'demo_absent' => $this->integer(),
            'demo_reject' => $this->integer(),
            'order_status' => $this->char(14)->notNull()->defaultValue('Новый'),
//            'order_status' => "ENUM('Новый','Принят','Невалид','Дубликат','Недозвон','Неинтересно','Потвержден','Отложен','Передумал','Готов к оплате','Непродан','Продажа','Апсейл') DEFAULT 'Новый'",
            'order_comment' => $this->string(255),
            'isRemoved'=> "TINYINT (1) default 1",

        ]);

        //add indexes for table 'order_info'

        $this->createIndex(
            'idx-order_info-client_id',
            'order_info',
            'client_id'
        );

        $this->createIndex(
            'idx-order_info-product_id',
            'order_info',
            'product_id'
        );

        $this->createIndex(
            'idx-order_info-course_id',
            'order_info',
            'course_id'
        );

        $this->createIndex(
            'idx-order_info-tutor_type_id',
            'order_info',
            'tutor_type_id'
        );

        //end creating indexes
        //add foreign keys for table 'order_info'

        $this->addForeignKey(
            'fk-order_info-client',
            'order_info',
            'client_id',
            'user',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-order_info-product',
            'order_info',
            'product_id',
            'product',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-order_info-course',
            'order_info',
            'course_id',
            'course',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-order_info-tutor_type',
            'order_info',
            'tutor_type_id',
            'tutor_type',
            'id',
            'CASCADE',
            'CASCADE'
        );

        //end dropping

    }

    /**
     * @inheritdoc
     */
    public function down()
    {

        $this->dropTable('{{%order_info}}');
    }
}
