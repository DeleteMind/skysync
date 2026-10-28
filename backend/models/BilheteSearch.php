<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Bilhete;

/**
 * BilheteSearch represents the model behind the search form of `common\models\Bilhete`.
 */
class BilheteSearch extends Bilhete
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'passageiro_id', 'voo_id', 'check_in'], 'integer'],
            [['numero', 'estado', 'data_compra', 'data_check_in'], 'safe'],
            [['preco_total'], 'number'],
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
        $query = Bilhete::find();

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
            'passageiro_id' => $this->passageiro_id,
            'voo_id' => $this->voo_id,
            'preco_total' => $this->preco_total,
            'check_in' => $this->check_in,
            'data_compra' => $this->data_compra,
            'data_check_in' => $this->data_check_in,
        ]);

        $query->andFilterWhere(['like', 'numero', $this->numero])
            ->andFilterWhere(['like', 'estado', $this->estado]);

        return $dataProvider;
    }
}
