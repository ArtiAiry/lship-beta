<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tutor_type`.
 */
class m170731_071503_create_tutor_type_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%tutor_type}}', [
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
        $this->dropTable('{{%tutor_type}}');
    }
}
