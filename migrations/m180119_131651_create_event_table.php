<?php

use yii\db\Migration;

/**
 * Handles the creation of table `events`.
 */
class m180119_131651_create_event_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%event}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(64)->notNull(),
            'description' => $this->string(255),
            'time_start' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'time_end' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%event}}');
    }
}
