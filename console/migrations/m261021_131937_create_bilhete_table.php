<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%bilhete}}`.
 */
class m261021_131937_create_bilhete_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%bilhete}}', [
            'id' => $this->primaryKey(),
            'numero' => $this->string(20)->notNull()->unique(),
            'passageiro_id' => $this->integer()->notNull(),
            'voo_id' => $this->integer()->notNull(),
            'preco_total' => $this->decimal(8, 2)->notNull(),
            'check_in' => $this->boolean()->notNull()->defaultValue(0),
            'estado' => "ENUM('reservado','pago','cancelado','utilizado') NOT NULL DEFAULT
'reservado'",
            'data_compra' => $this->dateTime()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'data_check_in' => $this->dateTime()->null(),
        ]);
        $this->addForeignKey('fk-bilhete-passageiro_id', '{{%bilhete}}', 'passageiro_id',
            '{{%passageiro}}', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk-bilhete-voo_id', '{{%bilhete}}', 'voo_id', '{{%voo}}', 'id',
            'RESTRICT', 'CASCADE');
    }
    public function safeDown()
    {
        $this->dropForeignKey('fk-bilhete-voo_id', '{{%bilhete}}');
        $this->dropForeignKey('fk-bilhete-passageiro_id', '{{%bilhete}}');
        $this->dropTable('{{%bilhete}}');
    }
}
