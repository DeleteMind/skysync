<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%passageiro}}`.
 */
class m261021_131619_create_passageiro_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%passageiro}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull()->unique(), // UNIQUE = relação 1:1
            'nome' => $this->string(100)->notNull(),
            'tipo_documento' => "ENUM('cc','passaporte','outro') NOT NULL",
            'numero_documento' => $this->string(20)->notNull(),
            'nacionalidade' => $this->string(50)->notNull(),
            'contacto' => $this->string(100)->notNull(),
        ]);
        $this->createIndex('idx-passageiro-documento', '{{%passageiro}}', ['tipo_documento',
            'numero_documento'], true);
        $this->addForeignKey('fk-passageiro-user_id', '{{%passageiro}}', 'user_id', '{{%user}}',
            'id', 'CASCADE', 'CASCADE');
    }
    public function safeDown()
    {
        $this->dropForeignKey('fk-passageiro-user_id', '{{%passageiro}}');
        $this->dropTable('{{%passageiro}}');
    }
}
