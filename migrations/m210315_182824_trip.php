<?php

use yii\db\Migration;

/**
 * Class m210315_182824_trip
 */
class m210315_182824_trip extends Migration
{
    public function safeUp()
    {
        $this->createTable('trip', [
          'id' =>  $this->primaryKey()->unsigned()->notNull(),
          'user_id' => $this->integer()->unsigned()->notNull(),
          'from' => $this->integer()->unsigned()->notNull(),
          'to' => $this->integer()->unsigned()->notNull(),
          'date' => $this->dateTime()->notNull(),
          'number_seats' => $this->integer()->notNull(),
          'duration' => $this->decimal(10,1)->notNull(),
          'price' => $this->decimal(10,2)->notNull(),
          'currency_id' => $this->integer()->unsigned()->notNull(),
          'status' => $this->integer()->notNull(),
          'created' => $this->timestamp(),
          'updated' => $this->dateTime()
        ]);

        $this->createIndex('index_trip_userID_users', 'trip', 'user_id');
        $this->createIndex('index_trip_from_place', 'trip', 'from');
        $this->createIndex('index_trip_to_place', 'trip', 'to');
        $this->createIndex('index_trip_currencyID_currency', 'trip', 'currency_id');

        $this->addForeignKey('fk_trip_userID_users', 'trip', 'user_id', 'users', 'id');
        $this->addForeignKey('fk_trip_from_place', 'trip', 'from', 'place', 'id');
        $this->addForeignKey('fk_trip_to_place', 'trip', 'to', 'place', 'id');
        $this->addForeignKey('fk_trip_currencyID_currency', 'trip', 'currency_id', 'currency', 'id');        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('index_trip_userID_users', 'trip');
        $this->dropIndex('index_trip_from_place', 'trip');
        $this->dropIndex('index_trip_to_place', 'trip');
        $this->dropIndex('index_trip_currencyID_currency', 'trip');

        $this->dropForeignKey('fk_trip_userID_users', 'trip');
        $this->dropForeignKey('fk_trip_from_place', 'trip');
        $this->dropForeignKey('fk_trip_to_place', 'trip');
        $this->dropForeignKey('fk_trip_currencyID_currency', 'trip');

        $this->dropTable('trip');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210315_182824_trip cannot be reverted.\n";

        return false;
    }
    */
}
