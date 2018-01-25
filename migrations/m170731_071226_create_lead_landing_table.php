<?php

use yii\db\Migration;

/**
 * Handles the creation of table `lead_landing`.
 */
class m170731_071226_create_lead_landing_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%lead_landing}}', [
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
        $this->dropTable('{{%lead_landing}}');
    }
}
