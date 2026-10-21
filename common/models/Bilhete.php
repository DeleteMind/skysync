<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "bilhete".
 *
 * @property int $id
 * @property string $numero
 * @property int $passageiro_id
 * @property int $voo_id
 * @property float $preco_total
 * @property int $check_in
 * @property string $estado
 * @property string $data_compra
 * @property string|null $data_check_in
 *
 * @property Bagagem[] $bagagems
 * @property Passageiro $passageiro
 * @property Voo $voo
 */
class Bilhete extends \yii\db\ActiveRecord
{

    /**
     * ENUM field values
     */
    const ESTADO_RESERVADO = 'reservado';
    const ESTADO_PAGO = 'pago';
    const ESTADO_CANCELADO = 'cancelado';
    const ESTADO_UTILIZADO = 'utilizado';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bilhete';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data_check_in'], 'default', 'value' => null],
            [['check_in'], 'default', 'value' => 0],
            [['estado'], 'default', 'value' => 'reservado'],
            [['numero', 'passageiro_id', 'voo_id', 'preco_total'], 'required'],
            [['passageiro_id', 'voo_id', 'check_in'], 'integer'],
            [['preco_total'], 'number'],
            [['estado'], 'string'],
            [['data_compra', 'data_check_in'], 'safe'],
            [['numero'], 'string', 'max' => 20],
            ['estado', 'in', 'range' => array_keys(self::optsEstado())],
            [['numero'], 'unique'],
            [['passageiro_id'], 'exist', 'skipOnError' => true, 'targetClass' => Passageiro::class, 'targetAttribute' => ['passageiro_id' => 'id']],
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
            'numero' => 'Numero',
            'passageiro_id' => 'Passageiro ID',
            'voo_id' => 'Voo ID',
            'preco_total' => 'Preco Total',
            'check_in' => 'Check In',
            'estado' => 'Estado',
            'data_compra' => 'Data Compra',
            'data_check_in' => 'Data Check In',
        ];
    }

    /**
     * Gets query for [[Bagagems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBagagems()
    {
        return $this->hasMany(Bagagem::class, ['bilhete_id' => 'id']);
    }

    /**
     * Gets query for [[Passageiro]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPassageiro()
    {
        return $this->hasOne(Passageiro::class, ['id' => 'passageiro_id']);
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


    /**
     * column estado ENUM value labels
     * @return string[]
     */
    public static function optsEstado()
    {
        return [
            self::ESTADO_RESERVADO => 'reservado',
            self::ESTADO_PAGO => 'pago',
            self::ESTADO_CANCELADO => 'cancelado',
            self::ESTADO_UTILIZADO => 'utilizado',
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
    public function isEstadoReservado()
    {
        return $this->estado === self::ESTADO_RESERVADO;
    }

    public function setEstadoToReservado()
    {
        $this->estado = self::ESTADO_RESERVADO;
    }

    /**
     * @return bool
     */
    public function isEstadoPago()
    {
        return $this->estado === self::ESTADO_PAGO;
    }

    public function setEstadoToPago()
    {
        $this->estado = self::ESTADO_PAGO;
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

    /**
     * @return bool
     */
    public function isEstadoUtilizado()
    {
        return $this->estado === self::ESTADO_UTILIZADO;
    }

    public function setEstadoToUtilizado()
    {
        $this->estado = self::ESTADO_UTILIZADO;
    }
}
