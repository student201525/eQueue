<?php

use yii\db\Migration;

/**
 * Class m180315_172051_users_table
 */
class m180315_172051_users_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('users',[
            'id'=>$this->primaryKey(),
            'firstName'=>$this->String()->notNull(),
            'secondName'=>$this->String()->notNull(),
            'login'=>$this->String()->notNull(),
            'password'=>$this->String()->notNull(),
            'role'=>$this->String()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('users');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180315_172051_users_table cannot be reverted.\n";

        return false;
    }
    */
}
