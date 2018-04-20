<?php

use yii\db\Migration;

/**
 * Class m180316_172036_tickets_table
 */
class m180316_172036_tickets_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('tickets',[
            'id'=>$this->primaryKey(),
            'numberTicket'=>$this->String()->notNull(),
            'idTicketWindow'=>$this->integer(),
            'createDate'=>$this->dateTime(),
            'completionDate'=>$this->dateTime(),
            'endDate'=>$this->dateTime(),

        ]);
        $this->addForeignKey(
            'fk-id_ticket_window',
            'tickets',
            'idTicketWindow',
            'windows',
            'id');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('tickets');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180316_172036_tickets_table cannot be reverted.\n";

        return false;
    }
    */
}
