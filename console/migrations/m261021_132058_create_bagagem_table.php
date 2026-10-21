<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%bagagem}}`.
 */
class m261021_132058_create_bagagem_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%bagagem}}', [
            'id' => $this->primaryKey(),
            'bilhete_id' => $this->integer()->notNull(),
            'tipo_bagagem_id' => $this->integer()->notNull(),
            'peso' => $this->decimal(5, 2)->notNull(),
            'preco' => $this->decimal(8, 2)->notNull(), // preço no momento da compra
        ]);
        $this->addForeignKey('fk-bagagem-bilhete_id', '{{%bagagem}}', 'bilhete_id', '{{%bilhete}}',
            'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk-bagagem-tipo_bagagem_id', '{{%bagagem}}', 'tipo_bagagem_id',
            '{{%tipo_bagagem}}', 'id', 'RESTRICT', 'CASCADE');
    }
    public function safeDown()
    {
        $this->dropForeignKey('fk-bagagem-tipo_bagagem_id', '{{%bagagem}}');
        $this->dropForeignKey('fk-bagagem-bilhete_id', '{{%bagagem}}');
        $this->dropTable('{{%bagagem}}');
    }
}
