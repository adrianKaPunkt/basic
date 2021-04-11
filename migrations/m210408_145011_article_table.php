<?php

use yii\db\Migration;

/**
 * Class m210408_145011_article_table
 */
class m210408_145011_article_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%article}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(100)->notNull(),
            'slug' => $this->string(100)->notNull(),
            'body' => $this->string(100)->notNull(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
        ]);

        $this->addForeignKey('article_user_created_by_fk', '{{%article}}', 'created_by', 'user', 'id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('article_user_created_by_fk', '{{%article}}');
        $this->dropTable('{{%article}}');
    }
}
