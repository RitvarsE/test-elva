<?php

use yii\db\Migration;

/**
 * Handles the creation of table `access_levels`.
 */
class m220612_173811_create_access_levels_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('access_levels', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'status' => $this->tinyInteger()->defaultValue(1)
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('access_levels');
    }
}
