<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%news}}`.
 */
class m241206_134454_create_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tamtable}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notnull(),
            'email' => $this->string(255)->notnull(),
            'subject' => $this->string(255)->notnull(),
            'body' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tamtable}}');
    }
}
