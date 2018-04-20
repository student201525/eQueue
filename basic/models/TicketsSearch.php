<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tickets;

/**
 * TicketsSearch represents the model behind the search form of `app\models\Tickets`.
 */
class TicketsSearch extends Tickets
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'idTicketWindow'], 'integer'],
            [['numberTicket', 'createDate', 'completionDate', 'endDate'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Tickets::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'idTicketWindow' => $this->idTicketWindow,
            'createDate' => $this->createDate,
            'completionDate' => $this->completionDate,
            'endDate' => $this->endDate,
        ]);

        $query->andFilterWhere(['like', 'numberTicket', $this->numberTicket]);

        return $dataProvider;
    }
}
