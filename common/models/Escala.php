<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "escala".
 *
 * @property int $id
 * @property int $voo_id
 * @property int $aeroporto_id
 * @property int $ordem
 * @property string $hora_chegada
 * @property string $hora_partida
 *
 * @property Aeroporto $aeroporto
 * @property Voo $voo
 */
class Escala extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'escala';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['voo_id', 'aeroporto_id', 'ordem', 'hora_chegada', 'hora_partida'], 'required'],
            [['voo_id', 'aeroporto_id', 'ordem'], 'integer'],
            [['hora_chegada', 'hora_partida'], 'safe'],
            [['voo_id', 'ordem'], 'unique', 'targetAttribute' => ['voo_id', 'ordem']],
            [['aeroporto_id'], 'exist', 'skipOnError' => true, 'targetClass' => Aeroporto::class, 'targetAttribute' => ['aeroporto_id' => 'id']],
            [['voo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Voo::class, 'targetAttribute' => ['voo_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'voo_id' => 'Voo ID',
            'aeroporto_id' => 'Aeroporto ID',
            'ordem' => 'Ordem',
            'hora_chegada' => 'Hora Chegada',
            'hora_partida' => 'Hora Partida',
        ];
    }

    /**
     * Gets query for [[Aeroporto]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAeroporto()
    {
        return $this->hasOne(Aeroporto::class, ['id' => 'aeroporto_id']);
    }

    /**
     * Gets query for [[Voo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVoo()
    {
        return $this->hasOne(Voo::class, ['id' => 'voo_id']);
    }

}
