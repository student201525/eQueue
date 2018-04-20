<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "operators".
 *
 * @property int $id
 * @property int $idUser
 * @property int $idOperatorWindow
 * @property string $beginWork
 * @property string $endWork
 *
 * @property Windows $operatorWindow
 * @property Users $user
 */
class Operators extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'operators';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idUser', 'idOperatorWindow'], 'required'],
            [['idUser', 'idOperatorWindow'], 'integer'],
            [['beginWork', 'endWork'], 'safe'],
            [['idOperatorWindow'], 'exist', 'skipOnError' => true, 'targetClass' => Windows::className(), 'targetAttribute' => ['idOperatorWindow' => 'id']],
            [['idUser'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['idUser' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idUser' => 'Id User',
            'idOperatorWindow' => 'Id Operator Window',
            'beginWork' => 'Begin Work',
            'endWork' => 'End Work',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOperatorWindow()
    {
        return $this->hasOne(Windows::className(), ['id' => 'idOperatorWindow']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'idUser']);
    }

    public function newOperator($idOperatorWindow,$idUser){
        $operator= new Operators();
        $operator->idOperatorWindow=$idOperatorWindow;
        $operator->idUser=$idUser;
        $operator->beginWork=date("y-m-d h:i:s");
        $this->save();
        return $operator;
    }

    public function completeWork(){
        $this->endWork=date("y-m-d h:i:s");
        $this->save();
    }


}
