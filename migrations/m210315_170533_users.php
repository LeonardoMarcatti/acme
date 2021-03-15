<?php

use yii\db\Migration;

/**
 * Class m210315_170533_users
 */
class m210315_170533_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('users',[
            'id' => $this->primaryKey()->unsigned()->notNull(),
            'uid' => $this->string(60)->notNull(),
            'username' => $this->string(45)->notNull(),
            'email' => $this->string(255)->notNull()->unique(),
            'password' => $this->string(60)->notNull(),
            'status' => $this->integer()->notNull(),
            'contact_email' => $this->integer()->notNull(),
            'contact_phone' => $this->integer()->notNull(),
            'created' => $this->dateTime()->notNull(),
            'updated' => $this->dateTime()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('users');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210315_170533_users cannot be reverted.\n";

        return false;
    }
    */
}
