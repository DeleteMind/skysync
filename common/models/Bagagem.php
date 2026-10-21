<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "bagagem".
 *
 * @property int $id
 * @property int $bilhete_id
 * @property int $tipo_bagagem_id
 * @property float $peso
 * @property float $preco
 *
 * @property Bilhete $bilhete
 * @property TipoBagagem $tipoBagagem
 */
class Bagagem extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bagagem';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bilhete_id', 'tipo_bagagem_id', 'peso', 'preco'], 'required'],
            [['bilhete_id', 'tipo_bagagem_id'], 'integer'],
            [['peso', 'preco'], 'number'],
            [['bilhete_id'], 'exist', 'skipOnError' => true, 'targetClass' => Bilhete::class, 'targetAttribute' => ['bilhete_id' => 'id']],
            [['tipo_bagagem_id'], 'exist', 'skipOnError' => true, 'targetClass' => TipoBagagem::class, 'targetAttribute' => ['tipo_bagagem_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bilhete_id' => 'Bilhete ID',
            'tipo_bagagem_id' => 'Tipo Bagagem ID',
            'peso' => 'Peso',
            'preco' => 'Preco',
        ];
    }

    /**
     * Gets query for [[Bilhete]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBilhete()
    {
        return $this->hasOne(Bilhete::class, ['id' => 'bilhete_id']);
    }

    /**
     * Gets query for [[TipoBagagem]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTipoBagagem()
    {
        return $this->hasOne(TipoBagagem::class, ['id' => 'tipo_bagagem_id']);
    }

}
