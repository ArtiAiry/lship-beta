<?php

use yii\db\Migration;

/**
 * Handles the creation of table `promocode`.
 */
class m170731_075052_create_promocode_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%promocode}}', [
            'id' => 'pk',
            'name' => $this->string(128)->notNull()->unique(),
            'action_id' => $this->integer(),
            'isRemoved'=> "TINYINT (1) default 1",
        ]);

        $this->createIndex(
            'idx-promocode-action_id',
            'promocode',
            'action_id'
        );

        // add foreign key for table `payout`
        $this->addForeignKey(
            'fk-promocode-action',
            'promocode',
            'action_id',
            'action',
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
        $this->dropTable('{{%promocode}}');
    }
}
