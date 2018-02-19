<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product`.
 */
class m170731_071443_create_product_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%product}}', [
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
        $this->dropTable('{{%product}}');
    }
}
