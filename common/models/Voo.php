<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "voo".
 *
 * @property int $id
 * @property string $numero
 * @property int $aviao_id
 * @property int $aeroporto_origem_id
 * @property int $aeroporto_destino_id
 * @property string|null $hora_partida
 * @property string|null $hora_chegada
 * @property string $hora_partida_prevista
 * @property string $hora_chegada_prevista
 * @property float $preco_base
 * @property string $estado
 * @property string|null $porta_embarque
 *
 * @property Aeroporto $aeroportoDestino
 * @property Aeroporto $aeroportoOrigem
 * @property Aviao $aviao
 * @property Bilhete[] $bilhetes
 * @property Escala[] $escalas
 */
class Voo extends \yii\db\ActiveRecord
{

    /**
     * ENUM field values
     */
    const ESTADO_AGENDADO = 'agendado';
    const ESTADO_PARTIU = 'partiu';
    const ESTADO_ATERROU = 'aterrou';
    const ESTADO_ATRASADO = 'atrasado';
    const ESTADO_CANCELADO = 'cancelado';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'voo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hora_partida', 'hora_chegada', 'porta_embarque'], 'default', 'value' => null],
            [['estado'], 'default', 'value' => 'agendado'],
            [['numero', 'aviao_id', 'aeroporto_origem_id', 'aeroporto_destino_id', 'hora_partida_prevista', 'hora_chegada_prevista', 'preco_base'], 'required'],
            [['aviao_id', 'aeroporto_origem_id', 'aeroporto_destino_id'], 'integer'],
            [['hora_partida', 'hora_chegada', 'hora_partida_prevista', 'hora_chegada_prevista'], 'safe'],
            [['preco_base'], 'number'],
            [['estado'], 'string'],
            [['numero'], 'string', 'max' => 10],
            [['porta_embarque'], 'string', 'max' => 5],
            ['estado', 'in', 'range' => array_keys(self::optsEstado())],
            [['aeroporto_destino_id'], 'exist', 'skipOnError' => true, 'targetClass' => Aeroporto::class, 'targetAttribute' => ['aeroporto_destino_id' => 'id']],
            [['aeroporto_origem_id'], 'exist', 'skipOnError' => true, 'targetClass' => Aeroporto::class, 'targetAttribute' => ['aeroporto_origem_id' => 'id']],
            [['aviao_id'], 'exist', 'skipOnError' => true, 'targetClass' => Aviao::class, 'targetAttribute' => ['aviao_id' => 'id']],
            ['aeroporto_destino_id', 'compare', 'compareAttribute' => 'aeroporto_origem_id', 'operator' => '!=',
                'message' => 'O destino tem de ser diferente da origem.'],
            ['hora_chegada', 'compare', 'compareAttribute' => 'hora_partida', 'operator' => '>', 'type' => 'string',
                'message' => 'A chegada tem de ser depois da partida.'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'numero' => 'Numero',
            'aviao_id' => 'Aviao ID',
            'aeroporto_origem_id' => 'Aeroporto Origem ID',
            'aeroporto_destino_id' => 'Aeroporto Destino ID',
            'hora_partida' => 'Hora Partida',
            'hora_chegada' => 'Hora Chegada',
            'hora_partida_prevista' => 'Hora Partida Prevista',
            'hora_chegada_prevista' => 'Hora Chegada Prevista',
            'preco_base' => 'Preco Base',
            'estado' => 'Estado',
            'porta_embarque' => 'Porta Embarque',
        ];
    }

    /**
     * Gets query for [[AeroportoDestino]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAeroportoDestino()
    {
        return $this->hasOne(Aeroporto::class, ['id' => 'aeroporto_destino_id']);
    }

    /**
     * Gets query for [[AeroportoOrigem]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAeroportoOrigem()
    {
        return $this->hasOne(Aeroporto::class, ['id' => 'aeroporto_origem_id']);
    }

    /**
     * Gets query for [[Aviao]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAviao()
    {
        return $this->hasOne(Aviao::class, ['id' => 'aviao_id']);
    }

    /**
     * Gets query for [[Bilhetes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBilhetes()
    {
        return $this->hasMany(Bilhete::class, ['voo_id' => 'id']);
    }

    /**
     * Gets query for [[Escalas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEscalas()
    {
        return $this->hasMany(Escala::class, ['voo_id' => 'id']);
    }


    /**
     * column estado ENUM value labels
     * @return string[]
     */
    public static function optsEstado()
    {
        return [
            self::ESTADO_AGENDADO => 'agendado',
            self::ESTADO_PARTIU => 'partiu',
            self::ESTADO_ATERROU => 'aterrou',
            self::ESTADO_ATRASADO => 'atrasado',
            self::ESTADO_CANCELADO => 'cancelado',
        ];
    }

    /**
     * @return string
     */
    public function displayEstado()
    {
        return self::optsEstado()[$this->estado];
    }

    /**
     * @return bool
     */
    public function isEstadoAgendado()
    {
        return $this->estado === self::ESTADO_AGENDADO;
    }

    public function setEstadoToAgendado()
    {
        $this->estado = self::ESTADO_AGENDADO;
    }

    /**
     * @return bool
     */
    public function isEstadoPartiu()
    {
        return $this->estado === self::ESTADO_PARTIU;
    }

    public function setEstadoToPartiu()
    {
        $this->estado = self::ESTADO_PARTIU;
    }

    /**
     * @return bool
     */
    public function isEstadoAterrou()
    {
        return $this->estado === self::ESTADO_ATERROU;
    }

    public function setEstadoToAterrou()
    {
        $this->estado = self::ESTADO_ATERROU;
    }

    /**
     * @return bool
     */
    public function isEstadoAtrasado()
    {
        return $this->estado === self::ESTADO_ATRASADO;
    }

    public function setEstadoToAtrasado()
    {
        $this->estado = self::ESTADO_ATRASADO;
    }

    /**
     * @return bool
     */
    public function isEstadoCancelado()
    {
        return $this->estado === self::ESTADO_CANCELADO;
    }

    public function setEstadoToCancelado()
    {
        $this->estado = self::ESTADO_CANCELADO;
    }
}
