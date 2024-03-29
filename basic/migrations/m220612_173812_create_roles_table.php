<?php

use yii\db\Migration;

/**
 * Handles the creation of table `roles`.
 */
class m220612_173812_create_roles_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('roles', [
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
        $this->dropTable('roles');
    }
}
