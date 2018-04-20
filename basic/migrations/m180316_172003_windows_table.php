<?php

use yii\db\Migration;

/**
 * Class m180316_172003_windows_table
 */
class m180316_172003_windows_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('windows',[
            'id'=>$this->primaryKey(),
            'numberWin'=>$this->String()->notNull(),
        ]);

    }


    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('windows');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180316_172003_windows_table cannot be reverted.\n";

        return false;
    }
    */
}
