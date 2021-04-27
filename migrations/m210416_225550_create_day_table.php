<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%day}}`.
 */
class m210416_225550_create_day_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%day}}', [
            'day_id' => $this->primaryKey(),
            'userid' => $this->integer(),
            'date' => $this->date(),
            'from' => $this->time(),
            'until' => $this->time(),
            'status' => $this->tinyInteger(),
            'type' => $this->tinyInteger(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%day}}');
    }
}
