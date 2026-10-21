<?php

use yii\db\Migration;

class m261021_133010_seed_dados_base extends Migration
{
    /**
     * {@inheritdoc}
     */

    public function safeUp()
    {
        $this->batchInsert('{{%companhia_aerea}}', ['nome', 'codigo'], [
            ['TAP Air Portugal', 'TP'],
            ['Ryanair', 'FR'],
            ['easyJet', 'U2'],
        ]);
        $this->batchInsert('{{%tipo_bagagem}}', ['nome', 'peso_maximo', 'preco'], [
            ['Mão', 10.00, 0.00],
            ['Porão 20kg', 20.00, 25.00],
            ['Porão 23kg', 23.00, 35.00],
        ]);
// Procurar as companhias pelo código, nunca pelo id
        $tap = (new \yii\db\Query())->select('id')->from('{{%companhia_aerea}}')->where(['codigo' =>
            'TP'])->scalar($this->db);
        $fr = (new \yii\db\Query())->select('id')->from('{{%companhia_aerea}}')->where(['codigo' =>
            'FR'])->scalar($this->db);
        $this->batchInsert('{{%aviao}}', ['matricula', 'modelo', 'capacidade', 'companhia_aerea_id',
            'estado'], [
            ['CS-TNP', 'Airbus A320', 174, $tap, 'ativo'],
            ['CS-TJE', 'Airbus A321neo', 216, $tap, 'ativo'],
            ['EI-DCL', 'Boeing 737-800', 189, $fr, 'ativo'],
        ]);
    }
    public function safeDown()
    {
        $this->delete('{{%aviao}}', ['matricula' => ['CS-TNP', 'CS-TJE', 'EI-DCL']]);
        $this->delete('{{%tipo_bagagem}}', ['nome' => ['Mão', 'Porão 20kg', 'Porão 23kg']]);
        $this->delete('{{%companhia_aerea}}', ['codigo' => ['TP', 'FR', 'U2']]);
    }



    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m261021_133010_seed_dados_base cannot be reverted.\n";

        return false;
    }
    */
}
