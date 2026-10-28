<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Escala;

/**
 * EscalaSearch represents the model behind the search form of `common\models\Escala`.
 */
class EscalaSearch extends Escala
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'voo_id', 'aeroporto_id', 'ordem'], 'integer'],
            [['hora_chegada', 'hora_partida'], 'safe'],
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
        $query = Escala::find();

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
            'voo_id' => $this->voo_id,
            'aeroporto_id' => $this->aeroporto_id,
            'ordem' => $this->ordem,
            'hora_chegada' => $this->hora_chegada,
            'hora_partida' => $this->hora_partida,
        ]);

        return $dataProvider;
    }
}
