<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "aeroporto".
 *
 * @property int $id
 * @property string $codigo
 * @property string $nome
 * @property string|null $codigo_iata
 * @property string|null $codigo_pais
 *
 * @property Escala[] $escalas
 * @property Voo[] $voos
 * @property Voo[] $voos0
 */
class Aeroporto extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'aeroporto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['codigo_iata', 'codigo_pais'], 'default', 'value' => null],
            [['codigo', 'nome'], 'required'],
            [['codigo'], 'string', 'max' => 10],
            [['nome'], 'string', 'max' => 150],
            [['codigo_iata'], 'string', 'max' => 3],
            [['codigo_pais'], 'string', 'max' => 2],
            [['codigo'], 'unique'],
            [['codigo_iata'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'codigo' => 'Codigo',
            'nome' => 'Nome',
            'codigo_iata' => 'Codigo Iata',
            'codigo_pais' => 'Codigo Pais',
        ];
    }

    /**
     * Gets query for [[Escalas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEscalas()
    {
        return $this->hasMany(Escala::class, ['aeroporto_id' => 'id']);
    }

    /**
     * Gets query for [[Voos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVoos()
    {
        return $this->hasMany(Voo::class, ['aeroporto_destino_id' => 'id']);
    }

    /**
     * Gets query for [[Voos0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVoos0()
    {
        return $this->hasMany(Voo::class, ['aeroporto_origem_id' => 'id']);
    }

}
