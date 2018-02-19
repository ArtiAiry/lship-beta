<?php

use yii\db\Migration;

/**
 * Handles the creation of table `payment`.
 */
class m170801_083513_create_payment_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%payment}}', [
            'id' => 'pk',
            'create_time' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'payment_type_id' => $this->integer(),
            'package_id' => $this->integer(),
            'lessons' => $this->integer(),
            'stock_lessons' => $this->integer(),
            'total_lessons' => $this->integer(),
            'isRejected'=> "TINYINT (1) default 1",
        ]);


        $this->createIndex(
            'idx-payment-payment_type_id',
            'payment',
            'payment_type_id'
        );

        $this->createIndex(
            'idx-payment-package_id',
            'payment',
            'package_id'
        );

        $this->addForeignKey(
            'fk-payment-payment_type',
            'payment',
            'payment_type_id',
            'payment_type',
            'id',
            'CASCADE',
            'CASCADE'

        );

        $this->addForeignKey(
            'fk-payment-package_id',
            'payment',
            'package_id',
            'package',
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

        $this->dropTable('{{%payment}}');
    }
}
