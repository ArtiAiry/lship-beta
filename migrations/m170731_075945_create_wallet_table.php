<?php

use yii\db\Migration;

/**
 * Handles the creation of table `wallet`.
 */
class m170731_075945_create_wallet_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%wallet}}', [
            'id' => 'pk',
            'payout_type_id' => $this->integer()->defaultValue(null),
            'bank_id' => $this->integer()->defaultValue(null),
            'currency_id' => $this->integer()->defaultValue(null),
            'isRemoved'=> "TINYINT (1) default 1",
        ]);

        $this->createIndex(
            'idx-wallet-payout_type_id',
            'wallet',
            'payout_type_id'
        );

        $this->createIndex(
            'idx-wallet-bank_id',
            'wallet',
            'bank_id'
        );

        $this->createIndex(
            'idx-wallet-currency_id',
            'wallet',
            'currency_id'
        );

        $this->addForeignKey(
            'fk-wallet-payout_type',
            'wallet',
            'payout_type_id',
            'payout_type',
            'id',
            'CASCADE',
            'CASCADE'

        );

        $this->addForeignKey(
            'fk-wallet-bank',
            'wallet',
            'bank_id',
            'bank',
            'id',
            'CASCADE',
            'CASCADE'

        );

        $this->addForeignKey(
            'fk-wallet-currency',
            'wallet',
            'currency_id',
            'currency',
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

        $this->dropTable('{{%wallet}}');
    }
}
