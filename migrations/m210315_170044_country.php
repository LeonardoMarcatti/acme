<?php

use yii\db\Migration;

/**
 * Class m210315_170044_country
 */
class m210315_170044_country extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('country',[
            'id' => $this->primaryKey()->unsigned()->notNull(),
            'code' => $this->string(2)->unique()->notNull(),
            'name' => $this->string(80)->notNull(),
            'phonecode' => $this->integer()->notNull(),
            'lat' => $this->string(45)->notNull(),
            'lng' => $this->string(45)->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('country');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210315_170044_country cannot be reverted.\n";

        return false;
    }
    */
}
