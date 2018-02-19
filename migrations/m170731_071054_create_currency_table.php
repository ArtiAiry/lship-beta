<?php

use yii\db\Migration;

/**
 * Handles the creation of table `currency`.
 */
class m170731_071054_create_currency_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%currency}}', [
            'id' => 'pk',
            'name' => $this->string(128)->notNull()->unique(),
            'isRemoved'=> "TINYINT (1) default 1",
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%currency}}');
    }
}
