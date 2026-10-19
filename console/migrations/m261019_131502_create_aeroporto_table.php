<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%aeroporto}}`.
 */
class m261019_131502_create_aeroporto_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%aeroporto}}', [
            'id' => $this->primaryKey(),
            'codigo' => $this->string(10)->notNull()->unique(), // código técnico (chave da importação)
            'nome' => $this->string(150)->notNull(),
            'codigo_iata' => $this->char(3)->null()->unique(), // código que o passageiro vê (LIS, OPO)
            'codigo_pais' => $this->char(2)->null(),
        ]);
    }
    public function safeDown()
    {
        $this->dropTable('{{%aeroporto}}');
    }
}
