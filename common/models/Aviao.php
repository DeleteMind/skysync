<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "aviao".
 *
 * @property int $id
 * @property string $matricula
 * @property string $modelo
 * @property int $capacidade
 * @property int $companhia_aerea_id
 * @property string $estado
 *
 * @property CompanhiaAerea $companhiaAerea
 * @property Voo[] $voos
 */
class Aviao extends \yii\db\ActiveRecord
{

    /**
     * ENUM field values
     */
    const ESTADO_ATIVO = 'ativo';
    const ESTADO_MANUTENCAO = 'manutencao';
    const ESTADO_INATIVO = 'inativo';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'aviao';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['estado'], 'default', 'value' => 'ativo'],
            [['matricula', 'modelo', 'capacidade', 'companhia_aerea_id'], 'required'],
            [['capacidade', 'companhia_aerea_id'], 'integer'],
            [['estado'], 'string'],
            [['matricula'], 'string', 'max' => 10],
            [['modelo'], 'string', 'max' => 50],
            ['estado', 'in', 'range' => array_keys(self::optsEstado())],
            [['matricula'], 'unique'],
            [['companhia_aerea_id'], 'exist', 'skipOnError' => true, 'targetClass' => CompanhiaAerea::class, 'targetAttribute' => ['companhia_aerea_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'matricula' => 'Matricula',
            'modelo' => 'Modelo',
            'capacidade' => 'Capacidade',
            'companhia_aerea_id' => 'Companhia Aerea ID',
            'estado' => 'Estado',
        ];
    }

    /**
     * Gets query for [[CompanhiaAerea]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompanhiaAerea()
    {
        return $this->hasOne(CompanhiaAerea::class, ['id' => 'companhia_aerea_id']);
    }

    /**
     * Gets query for [[Voos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVoos()
    {
        return $this->hasMany(Voo::class, ['aviao_id' => 'id']);
    }


    /**
     * column estado ENUM value labels
     * @return string[]
     */
    public static function optsEstado()
    {
        return [
            self::ESTADO_ATIVO => 'ativo',
            self::ESTADO_MANUTENCAO => 'manutencao',
            self::ESTADO_INATIVO => 'inativo',
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
    public function isEstadoAtivo()
    {
        return $this->estado === self::ESTADO_ATIVO;
    }

    public function setEstadoToAtivo()
    {
        $this->estado = self::ESTADO_ATIVO;
    }

    /**
     * @return bool
     */
    public function isEstadoManutencao()
    {
        return $this->estado === self::ESTADO_MANUTENCAO;
    }

    public function setEstadoToManutencao()
    {
        $this->estado = self::ESTADO_MANUTENCAO;
    }

    /**
     * @return bool
     */
    public function isEstadoInativo()
    {
        return $this->estado === self::ESTADO_INATIVO;
    }

    public function setEstadoToInativo()
    {
        $this->estado = self::ESTADO_INATIVO;
    }
}
