<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%companhia_aerea}}`.
 */
class m261019_131324_create_companhia_aerea_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%companhia_aerea}}', [
            'id' => $this->primaryKey(),
            'nome' => $this->string(100)->notNull(),
            'codigo' => $this->string(3)->notNull()->unique(),
        ]);
    }
    public function safeDown()
    {
        $this->dropTable('{{%companhia_aerea}}');
    }
}
