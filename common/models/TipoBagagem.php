<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tipo_bagagem".
 *
 * @property int $id
 * @property string $nome
 * @property float $peso_maximo
 * @property float $preco
 *
 * @property Bagagem[] $bagagems
 */
class TipoBagagem extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipo_bagagem';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'peso_maximo', 'preco'], 'required'],
            [['peso_maximo', 'preco'], 'number'],
            [['nome'], 'string', 'max' => 30],
            [['nome'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'peso_maximo' => 'Peso Maximo',
            'preco' => 'Preco',
        ];
    }

    /**
     * Gets query for [[Bagagems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBagagems()
    {
        return $this->hasMany(Bagagem::class, ['tipo_bagagem_id' => 'id']);
    }

}
