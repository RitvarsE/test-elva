<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%work_items}}`.
 */
class m220612_180755_create_work_items_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%work_items}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'description' => $this->text()->null()
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%work_items}}');
    }
}
