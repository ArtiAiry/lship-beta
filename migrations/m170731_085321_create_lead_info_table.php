<?php

use yii\db\Migration;

/**
 * Handles the creation of table `lead_info`.
 */
class m170731_085321_create_lead_info_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%lead_info}}', [
            'id' => 'pk',
            'create_time' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'client_id' => $this->integer(),
            'product_id' => $this->integer(),
            'lead_channel_id' => $this->integer(),
            'partner_id' => $this->integer(),
            'aff_id' => $this->integer(),
            'lead_landing_id' => $this->integer(),
            'lead_form_id' => $this->integer(),
            'source'=> $this->string(255),
            'conv_url' => $this->string(255),
            'ga_cid' => $this->integer(),
            'utm_medium' => $this->integer(),
            'utm_term' => $this->integer(),
            'utm_content' => $this->integer(),
            'utm_campaign' => $this->integer(),
            'promocode_id' => $this->integer(),
            'count_orders' => $this->integer(),
            'count_sells' => $this->integer(),
            'total_lessons' => $this->integer(),
            'isRemoved'=> "TINYINT (1) default 1",
        ]);

        //creating indexes for table 'lead_info'

        $this->createIndex(
            'idx-lead_info-client_id',
            'lead_info',
            'client_id'
        );

        $this->createIndex(
            'idx-lead_info-product_id',
            'lead_info',
            'product_id'
        );

        $this->createIndex(
            'idx-lead_info-lead_channel_id',
            'lead_info',
            'lead_channel_id'
        );

        $this->createIndex(
            'idx-lead_info-lead_landing_id',
            'lead_info',
            'lead_landing_id'
        );

        $this->createIndex(
            'idx-lead_info-lead_form_id',
            'lead_info',
            'lead_form_id'
        );

        $this->createIndex(
            'idx-lead_info-promocode_id',
            'lead_info',
            'promocode_id'
        );

        //end creating indexes
        //creating foregin keys for table 'lead_info'


        $this->addForeignKey(
            'fk-lead_info-client',
            'lead_info',
            'client_id',
            'user',
            'id',
            'CASCADE',
            'CASCADE'

        );

        $this->addForeignKey(
            'fk-lead_info-product',
            'lead_info',
            'product_id',
            'product',
            'id',
            'CASCADE',
            'CASCADE'

        );

        $this->addForeignKey(
            'fk-lead_info-lead_channel',
            'lead_info',
            'lead_channel_id',
            'lead_channel',
            'id',
            'CASCADE',
            'CASCADE'

        );

        $this->addForeignKey(
            'fk-lead_info-lead_landing',
            'lead_info',
            'lead_landing_id',
            'lead_landing',
            'id',
            'CASCADE',
            'CASCADE'

        );

        $this->addForeignKey(
            'fk-lead_info-lead_form',
            'lead_info',
            'lead_form_id',
            'lead_form',
            'id',
            'CASCADE',
            'CASCADE'

        );

        $this->addForeignKey(
            'fk-lead_info-promocode',
            'lead_info',
            'promocode_id',
            'promocode',
            'id',
            'CASCADE',
            'CASCADE'

        );

        //end creating foreign keys

    }



    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%lead_info}}');
    }
}
