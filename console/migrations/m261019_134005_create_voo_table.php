<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%voo}}`.
 */
class m261019_134005_create_voo_table extends Migration
{
    /**
     * {@inheritdoc}
     */


    public function safeUp()
    {
        $this->createTable('{{%voo}}', [
            'id' => $this->primaryKey(),
            'numero' => $this->string(10)->notNull(),
            'aviao_id' => $this->integer()->notNull(),
            'aeroporto_origem_id' => $this->integer()->notNull(),
            'aeroporto_destino_id' => $this->integer()->notNull(),
            'hora_partida' => $this->dateTime(),
            'hora_chegada' => $this->dateTime(),
            'hora_partida_prevista' => $this->dateTime()->notNull(),
            'hora_chegada_prevista' => $this->dateTime()->notNull(),
            'preco_base' => $this->decimal(8, 2)->notNull(),
            'estado' => "ENUM('agendado','partiu','aterrou','atrasado','cancelado') NOT
                        NULL DEFAULT 'agendado'",
            'porta_embarque' => $this->string(5)->null(),
        ]);
        $this->addForeignKey('fk-voo-aviao_id', '{{%voo}}', 'aviao_id', '{{%aviao}}', 'id',
            'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk-voo-aeroporto_origem_id', '{{%voo}}', 'aeroporto_origem_id',
            '{{%aeroporto}}', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk-voo-aeroporto_destino_id', '{{%voo}}', 'aeroporto_destino_id',
            '{{%aeroporto}}', 'id', 'RESTRICT', 'CASCADE');
    }


    public function safeDown()
    {
        $this->dropForeignKey('fk-voo-aeroporto_destino_id', '{{%voo}}');
        $this->dropForeignKey('fk-voo-aeroporto_origem_id', '{{%voo}}');
        $this->dropForeignKey('fk-voo-aviao_id', '{{%voo}}');
        $this->dropTable('{{%voo}}');
    }
}
