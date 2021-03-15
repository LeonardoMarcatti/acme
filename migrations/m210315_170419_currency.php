<?php

use yii\db\Migration;

/**
 * Class m210315_170419_currency
 */
class m210315_170419_currency extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('currency', [
            'id' => $this->primaryKey()->unsigned()->notNull(),
            'code' => $this->string(3)->notNull()->unique(),
            'sign_format' => $this->string(45)->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('currency');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210315_170419_currency cannot be reverted.\n";

        return false;
    }
    */
}
