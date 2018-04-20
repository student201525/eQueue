<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tickets".
 *
 * @property int $id
 * @property string $numberTicket
 * @property int $idTicketWindow
 * @property string $createDate
 * @property string $completionDate
 * @property string $endDate
 *
 * @property Windows $ticketWindow
 */
class Tickets extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tickets';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['numberTicket'], 'required'],
            [['idTicketWindow'], 'integer'],
            [['createDate', 'completionDate', 'endDate'], 'safe'],
            [['numberTicket'], 'string', 'max' => 255],
            [['idTicketWindow'], 'exist', 'skipOnError' => true, 'targetClass' => Windows::className(), 'targetAttribute' => ['idTicketWindow' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'numberTicket' => 'Number Ticket',
            'idTicketWindow' => 'Id Ticket Window',
            'createDate' => 'Create Date',
            'completionDate' => 'Completion Date',
            'endDate' => 'End Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTicketWindow()
    {
        return $this->hasOne(Windows::className(), ['id' => 'idTicketWindow']);
    }


    public function newTicket($numberTicket){
        $ticket= new Tickets();
        $ticket->numberTicket=$numberTicket;
        $ticket->createDate=date("y-m-d h:i:s");
        $this->save();
        return $ticket;
    }

    public function endTicket(){
        $this->endDate=date("y-m-d h:i:s");
        $this->save();
    }

    public function adoptionTicket($idTicketWindow){
        $this->completionDate=date("y-m-d h:i:s");
        $this->idTicketWindow=$idTicketWindow;
        $this->save();
    }
}
