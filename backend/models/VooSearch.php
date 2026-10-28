<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Voo;

/**
 * VooSearch represents the model behind the search form of `common\models\Voo`.
 */
class VooSearch extends Voo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'aviao_id', 'aeroporto_origem_id', 'aeroporto_destino_id'], 'integer'],
            [['numero', 'hora_partida', 'hora_chegada', 'hora_partida_prevista', 'hora_chegada_prevista', 'estado', 'porta_embarque'], 'safe'],
            [['preco_base'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
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
     * @param string|null $formName Form name to be used into `->load()` method.
     *
     * @return ActiveDataProvider
     */
    public function search($params, $formName = null)
    {
        $query = Voo::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params, $formName);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'aviao_id' => $this->aviao_id,
            'aeroporto_origem_id' => $this->aeroporto_origem_id,
            'aeroporto_destino_id' => $this->aeroporto_destino_id,
            'hora_partida' => $this->hora_partida,
            'hora_chegada' => $this->hora_chegada,
            'hora_partida_prevista' => $this->hora_partida_prevista,
            'hora_chegada_prevista' => $this->hora_chegada_prevista,
            'preco_base' => $this->preco_base,
        ]);

        $query->andFilterWhere(['like', 'numero', $this->numero])
            ->andFilterWhere(['like', 'estado', $this->estado])
            ->andFilterWhere(['like', 'porta_embarque', $this->porta_embarque]);

        return $dataProvider;
    }
}
