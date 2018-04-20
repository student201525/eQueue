<?php

use yii\db\Migration;

/**
 * Class m180316_172019_operators_table
 */
class m180316_172019_operators_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('operators',[
            'id'=>$this->primaryKey(),
            'idUser'=>$this->integer()->notNull(),
            'idOperatorWindow'=>$this->integer()->notNull(),
            'beginWork'=>$this->dateTime(),
            'endWork'=>$this->dateTime(),

        ]);

        $this->addForeignKey(
            'fk-id_user',
            'operators',
            'idUser',
            'users',
            'id'
        );

        $this->addForeignKey(
            'fk-id_operator_window',
            'operators',
            'idOperatorWindow',
            'windows',
            'id'
        );
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('operators');

    }


    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180316_172019_operators_table cannot be reverted.\n";

        return false;
    }
    */
}
