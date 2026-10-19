<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tipo_bagagem}}`.
 */
class m261019_131815_create_tipo_bagagem_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tipo_bagagem}}', [
            'id' => $this->primaryKey(),
            'nome' => $this->string(30)->notNull()->unique(),
            'peso_maximo' => $this->decimal(5, 2)->notNull(),
            'preco' => $this->decimal(8, 2)->notNull(),
        ]);
    }
    public function safeDown()
    {
        $this->dropTable('{{%tipo_bagagem}}');
    }
}
