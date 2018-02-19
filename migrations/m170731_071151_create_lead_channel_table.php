<?php

use yii\db\Migration;

/**
 * Handles the creation of table `lead_channel`.
 */
class m170731_071151_create_lead_channel_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%lead_channel}}', [
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
        $this->dropTable('{{%lead_channel}}');
    }
}
