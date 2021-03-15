<?php

use yii\db\Migration;

/**
 * Class m210315_184445_message
 */
class m210315_184445_message extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('message', [
            'id' => $this->primaryKey()->unsigned()->notNull(),
            'from_user_id' => $this->integer()->unsigned()->notNull(),
            'to_user_id' => $this->integer()->unsigned()->notNull(),
            'trip_id' => $this->integer()->unsigned()->notNull(),
            'text' => $this->text(),
            'created' => $this->timestamp()
        ]);

        $this->createIndex('index_message_fromUserID', 'message', 'from_user_id');
        $this->createIndex('index_message_toUserID', 'message', 'to_user_id');
        $this->createIndex('index_message_tripID', 'message', 'trip_id');

        $this->addForeignKey('fk_message_fromUserID', 'message', 'from_user_id', 'users', 'id');
        $this->addForeignKey('fk_message_toUserID', 'message', 'to_user_id', 'users', 'id');
        $this->addForeignKey('fk_message_tripID', 'message', 'trip_id', 'trip', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('index_message_fromUserID', 'message');
        $this->dropIndex('index_message_toUserID', 'message');
        $this->dropIndex('index_message_tripID', 'message');

        $this->dropForeignKey('fk_message_fromUserID', 'message');
        $this->dropForeignKey('fk_message_toUserID', 'message');
        $this->dropForeignKey('fk_message_tripID', 'message');

        $this->dropTable('message');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210315_184445_message cannot be reverted.\n";

        return false;
    }
    */
}
