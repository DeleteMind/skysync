<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%escala}}`.
 */
class m261019_134410_create_escala_table extends Migration
{
    /**
     * {@inheritdoc}
     */


    public function safeUp()
    {
        $this->createTable('{{%escala}}', [
            'id' => $this->primaryKey(),
            'voo_id' => $this->integer()->notNull(),
            'aeroporto_id' => $this->integer()->notNull(),
            'ordem' => $this->integer()->notNull(),
            'hora_chegada' => $this->dateTime()->notNull(),
            'hora_partida' => $this->dateTime()->notNull(),
        ]);


        // Um voo não pode ter duas escalas com a mesma ordem
        $this->createIndex('idx-escala-voo_id-ordem', '{{%escala}}', ['voo_id', 'ordem'], true);
        $this->addForeignKey('fk-escala-voo_id', '{{%escala}}', 'voo_id', '{{%voo}}', 'id',
            'CASCADE', 'CASCADE');
        $this->addForeignKey('fk-escala-aeroporto_id', '{{%escala}}', 'aeroporto_id',
            '{{%aeroporto}}', 'id', 'RESTRICT', 'CASCADE');
    }


    public function safeDown()
    {
        $this->dropForeignKey('fk-escala-aeroporto_id', '{{%escala}}');
        $this->dropForeignKey('fk-escala-voo_id', '{{%escala}}');
        $this->dropTable('{{%escala}}');
    }
}
