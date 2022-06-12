<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%construction_sites}}`.
 */
class m220612_180117_create_construction_sites_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%construction_sites}}', [
            'id' => $this->primaryKey(),
            'title' => $this->text(),
            'location' => $this->text(),
            'area' => $this->float(),
            'access_level_id' => $this->integer()->notNull()
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci');

        $this->createIndex(
            'id-construction_site-access_level_id',
            'construction_sites',
            'access_level_id'
        );

        $this->addForeignKey(
            'fk-construction_site-access_level_id',
            'construction_sites',
            'access_level_id',
            'access_levels',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-construction_site-access_level_id',
            'construction_sites'
        );
        $this->dropIndex(
            'id-construction_site-access_level_id',
            'construction_sites'
        );
        $this->dropTable('{{%construction_sites}}');
    }
}
