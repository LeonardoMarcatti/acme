<?php

use yii\db\Migration;

/**
 * Class m210315_172151_phone_number
 */
class m210315_172151_phone_number extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('phone_number',[
            'id' => $this->primaryKey()->unsigned()->notNull(),
            'user_id' => $this->integer()->unsigned()->notNull(),
            'country_id' => $this->integer()->unsigned()->notNull(),
            'number' => $this->string(45)->notNull(),
            'verification_code' => $this->string(45)->notNull(),
            'verified' => $this->boolean()->notNull(),
            'active' => $this->boolean()->notNull(),
            'created' => $this->timestamp()->notNull()
        ]);

        $this->createIndex('index_userID_users', 'phone_number', 'user_id');
        $this->createIndex('index_countryID_country', 'phone_number', 'country_id');

        $this->addForeignKey('fk_userID_users', 'phone_number', 'user_id', 'users', 'id');
        $this->addForeignKey('fk_countryID_country', 'phone_number', 'country_id', 'country', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('index_userID_users', 'phone_number');
        $this->dropIndex('index_countryID_country', 'phone_number');

        $this->dropForeignKey('fk_userID_users', 'phone_number');
        $this->dropForeignKey('fk_userID_users', 'phone_number');

        $this->dropTable('phone_number');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210315_172151_phone_number cannot be reverted.\n";

        return false;
    }
    */
}
