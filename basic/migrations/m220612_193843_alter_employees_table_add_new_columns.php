<?php

use yii\db\Migration;

/**
 * Class m220612_193843_alter_employees_table_add_new_columns
 */
class m220612_193843_alter_employees_table_add_new_columns extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('employees', 'username', 'string CHARACTER SET utf8 COLLATE utf8_unicode_ci');
        $this->addColumn('employees', 'password', 'string CHARACTER SET utf8 COLLATE utf8_unicode_ci');
        $this->addColumn('employees', 'authKey', 'string CHARACTER SET utf8 COLLATE utf8_unicode_ci');
        $this->addColumn('employees', 'accessToken', 'string CHARACTER SET utf8 COLLATE utf8_unicode_ci');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220612_193843_alter_employees_table_add_new_columns cannot be reverted.\n";
        $this->dropColumn('employees', 'username');
        $this->dropColumn('employees', 'password');
        $this->dropColumn('employees', 'authKey');
        $this->dropColumn('employees', 'accessToken');
    }


}
