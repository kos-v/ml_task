<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m210628_072756_create_short_links_opening_count_column
 */
class m210628_072756_create_short_links_opening_count_column extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(
            '{{%short_links}}',
            'openings_count',
            Schema::TYPE_INTEGER . ' NOT NULL DEFAULT 0'
        );
    }
    
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%short_links}}', 'openings_count');
    }
}
