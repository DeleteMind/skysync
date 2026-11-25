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

    public $voo_numero;
    public $aeroporto_nome;

    public function rules()
    {
        return [
            [['id', 'voo_id', 'aeroporto_id', 'ordem'], 'integer'],
            [['hora_chegada', 'hora_partida'], 'safe'],
            [['voo_numero'], 'safe'],
            [['aeroporto_nome'], 'safe'],
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
        //juntar a tabela de voo e aeroporto
        $query = Escala::find()->joinWith(['voo']);
        $query = Escala::find()->joinWith(['voo', 'aeroporto']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['voo_numero'] = [
            'asc' => ['voo.numero' => SORT_ASC],
            'desc' => ['voo.numero' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['aeroporto_nome'] = [
            'asc' => ['aeroporto.nome' => SORT_ASC],
            'desc' => ['aeroporto.nome' => SORT_DESC],      //tabela aeroporto coluna nome
        ];

        $this->load($params, $formName);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'escala.id' => $this->id,
            'escala.voo_id' => $this->voo_id,
            'escala.aeroporto_id' => $this->aeroporto_id,
            'escala.ordem' => $this->ordem,
            'escala.hora_chegada' => $this->hora_chegada,
            'escala.hora_partida' => $this->hora_partida,
        ]);

        $query->andFilterWhere(['like', 'voo.numero', $this->voo_numero]);
        $query->andFilterWhere(['like', 'aeroporto.nome', $this->aeroporto_nome]);  //tabela aeroporto coluna nome

        return $dataProvider;
    }
}
