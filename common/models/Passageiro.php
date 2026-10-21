<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "passageiro".
 *
 * @property int $id
 * @property int $user_id
 * @property string $nome
 * @property string $tipo_documento
 * @property string $numero_documento
 * @property string $nacionalidade
 * @property string $contacto
 *
 * @property Bilhete[] $bilhetes
 * @property User $user
 */
class Passageiro extends \yii\db\ActiveRecord
{

    /**
     * ENUM field values
     */
    const TIPO_DOCUMENTO_CC = 'cc';
    const TIPO_DOCUMENTO_PASSAPORTE = 'passaporte';
    const TIPO_DOCUMENTO_OUTRO = 'outro';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'passageiro';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'nome', 'tipo_documento', 'numero_documento', 'nacionalidade', 'contacto'], 'required'],
            [['user_id'], 'integer'],
            [['tipo_documento'], 'string'],
            [['nome', 'contacto'], 'string', 'max' => 100],
            [['numero_documento'], 'string', 'max' => 20],
            [['nacionalidade'], 'string', 'max' => 50],
            ['tipo_documento', 'in', 'range' => array_keys(self::optsTipoDocumento())],
            [['user_id'], 'unique'],
            [['tipo_documento', 'numero_documento'], 'unique', 'targetAttribute' => ['tipo_documento', 'numero_documento']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'nome' => 'Nome',
            'tipo_documento' => 'Tipo Documento',
            'numero_documento' => 'Numero Documento',
            'nacionalidade' => 'Nacionalidade',
            'contacto' => 'Contacto',
        ];
    }

    /**
     * Gets query for [[Bilhetes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBilhetes()
    {
        return $this->hasMany(Bilhete::class, ['passageiro_id' => 'id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }


    /**
     * column tipo_documento ENUM value labels
     * @return string[]
     */
    public static function optsTipoDocumento()
    {
        return [
            self::TIPO_DOCUMENTO_CC => 'cc',
            self::TIPO_DOCUMENTO_PASSAPORTE => 'passaporte',
            self::TIPO_DOCUMENTO_OUTRO => 'outro',
        ];
    }

    /**
     * @return string
     */
    public function displayTipoDocumento()
    {
        return self::optsTipoDocumento()[$this->tipo_documento];
    }

    /**
     * @return bool
     */
    public function isTipoDocumentoCc()
    {
        return $this->tipo_documento === self::TIPO_DOCUMENTO_CC;
    }

    public function setTipoDocumentoToCc()
    {
        $this->tipo_documento = self::TIPO_DOCUMENTO_CC;
    }

    /**
     * @return bool
     */
    public function isTipoDocumentoPassaporte()
    {
        return $this->tipo_documento === self::TIPO_DOCUMENTO_PASSAPORTE;
    }

    public function setTipoDocumentoToPassaporte()
    {
        $this->tipo_documento = self::TIPO_DOCUMENTO_PASSAPORTE;
    }

    /**
     * @return bool
     */
    public function isTipoDocumentoOutro()
    {
        return $this->tipo_documento === self::TIPO_DOCUMENTO_OUTRO;
    }

    public function setTipoDocumentoToOutro()
    {
        $this->tipo_documento = self::TIPO_DOCUMENTO_OUTRO;
    }
}
