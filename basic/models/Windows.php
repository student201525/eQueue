<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "windows".
 *
 * @property int $id
 * @property string $numberWin
 *
 * @property Operators[] $operators
 * @property Tickets[] $tickets
 */
class Windows extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'windows';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['numberWin'], 'required'],
            [['numberWin'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'numberWin' => 'Number Win',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOperators()
    {
        return $this->hasMany(Operators::className(), ['idOperatorWindow' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTickets()
    {
        return $this->hasMany(Tickets::className(), ['idTicketWindow' => 'id']);
    }

    public function newWindow($numberWin){
        $window = new Windows();
        $window->numberWin=$numberWin;
        $this->save();
        return $window;
    }


}
