<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation of table `{{%short_links}}`.
 */
class m210627_103646_create_short_links_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%short_links}}', [
            'uid' => Schema::TYPE_STRING . ' NOT NULL PRIMARY KEY',
            'link' => Schema::TYPE_TEXT . ' NOT NULL'
        ]);
    }
    
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%short_links}}');
    }
}
