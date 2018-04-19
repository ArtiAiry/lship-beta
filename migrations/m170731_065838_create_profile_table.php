<?php

use yii\db\Migration;

/**
 * Handles the creation of table `profile`.
 */
class m170731_065838_create_profile_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%profile}}', [
            'id' => 'pk',
            'user_id' => $this->integer()->notNull(),
            'first_name' => $this->string(64),
            'last_name' => $this->string(64),
            'skype' => $this->string(255)->notNull()->unique()->defaultValue(null),
            'phone' => $this->string(24)->notNull()->defaultValue(null),
            'country' => $this->string(38)->notNull()->defaultValue(null),
            'city' => $this->string(178)->notNull()->defaultValue(null),
            'ip_address' => $this->string()->defaultValue(null),
            'age' => $this->integer()->notNull()->defaultValue(null),
            'gender' => $this->char(7)->defaultValue(0),
            'dob' => $this->date()->defaultValue(null), //date of birth
            'activity' => $this->string(255)->defaultValue(null),
            'interests' => $this->string(255)->defaultValue(null),
            'tutor_type' => $this->string(255)->defaultValue(null),
            'isRemoved'=> "TINYINT (1) default 1",
        ]);

        $this->createIndex(
            'idx-profile-user_id',
            'profile',
            'user_id'
        );

        $this->addForeignKey(
            'fk-profile-user',
            'profile',
            'user_id',
            'user',
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

        $this->dropTable('{{%profile}}');
    }
}
