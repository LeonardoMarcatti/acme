<?php

use yii\db\Migration;

/**
 * Class m210315_170635_place_lang
 */
class m210315_170635_place_lang extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('place_lang', [
            'id' => $this->primaryKey()->unsigned()->notNull(),
            'place_id' => $this->integer()->unsigned()->notNull(),
            'locality' => $this->string(45)->notNull(),
            'country' => $this->string(45)->notNull(),
            'lang' => $this->string(2)->notNull(),
        ]);

        $this->createIndex('index_placeLang', 'place_lang', 'place_id');
        $this->addForeignKey('fk_placeLang_placeID', 'place_lang', 'place_id', 'place', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('index_placeLang', 'place_lang');
        $this->dropPrimaryKey('fk_placeLang_placeID', 'place_lang');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210315_170635_place_lang cannot be reverted.\n";

        return false;
    }
    */
}
