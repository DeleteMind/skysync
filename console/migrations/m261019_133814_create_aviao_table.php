<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%aviao}}`.
 */
class m261019_133814_create_aviao_table extends Migration
{
    /**
     * {@inheritdoc}
     */


    public function safeUp()
    {
        $this->createTable('{{%aviao}}', [
            'id' => $this->primaryKey(),
            'matricula' => $this->string(10)->notNull()->unique(),
            'modelo' => $this->string(50)->notNull(),
            'capacidade' => $this->integer()->notNull(),
            'companhia_aerea_id' => $this->integer()->notNull(),
            'estado' => "ENUM('ativo','manutencao','inativo') NOT NULL DEFAULT 'ativo'",
        ]);
        $this->addForeignKey(
            'fk-aviao-companhia_aerea_id',
            '{{%aviao}}', 'companhia_aerea_id',
            '{{%companhia_aerea}}', 'id',
            'RESTRICT', 'CASCADE'
        );
    }


    public function safeDown()
    {
        $this->dropForeignKey('fk-aviao-companhia_aerea_id', '{{%aviao}}');
        $this->dropTable('{{%aviao}}');
    }
}
