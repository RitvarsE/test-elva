<?php

use yii\db\Migration;

/**
 * Handles the creation of table `employees`.
 */
class m220612_173813_create_employees_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('employees', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'surname' => $this->string(),
            'birthday' => $this->date(),
            'access_level_id' => $this->integer()->notNull(),
            'role_id' =>  $this->integer()->notNull()
        ]);
        $this->createIndex(
            'id-employee-access_level_id',
            'employees',
            'access_level_id'
        );


        $this->addForeignKey(
            'fk-employee-access_level_id',
            'employees',
            'access_level_id',
            'access_levels',
            'id',
            'CASCADE'
        );
        $this->createIndex(
            'id-employee-role_id',
            'employees',
            'role_id'
        );

        $this->addForeignKey(
            'fk-employee-role_id',
            'employees',
            'role_id',
            'roles',
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
            'fk-employee-access_level_id',
            'employees'
        );
        $this->dropIndex(
            'id-employee-access_level_id',
            'employees'
        );
        $this->dropForeignKey(
            'fk-employee-role_id',
            'employees'
        );
        $this->dropIndex(
            'id-employee-role_id',
            'employees'
        );
        $this->dropTable('employees');
    }
}
