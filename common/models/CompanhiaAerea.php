<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "companhia_aerea".
 *
 * @property int $id
 * @property string $nome
 * @property string $codigo
 *
 * @property Aviao[] $aviaos
 */
class CompanhiaAerea extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'companhia_aerea';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'codigo'], 'required'],
            [['nome'], 'string', 'max' => 100],
            [['codigo'], 'string', 'max' => 3],
            [['codigo'], 'unique'],
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
            'codigo' => 'Codigo',
        ];
    }

    /**
     * Gets query for [[Aviaos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAviaos()
    {
        return $this->hasMany(Aviao::class, ['companhia_aerea_id' => 'id']);
    }

}
