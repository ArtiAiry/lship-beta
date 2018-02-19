<?php

use yii\db\Migration;

/**
 * Handles the creation of table `course`.
 */
class m170731_071111_create_course_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%course}}', [
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
        $this->dropTable('{{%course}}');
    }
}
