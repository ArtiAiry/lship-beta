<?php

use yii\db\Migration;

/**
 * Handles the creation of table `action`.
 */
class m170731_071003_create_action_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%action}}', [
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
        $this->dropTable('{{%action}}');
    }
}
