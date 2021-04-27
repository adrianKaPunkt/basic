<?php

use yii\db\Migration;

/**
 * Class m210416_235608_insert_days
 */
class m210416_235608_insert_days extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('{{%day}}', [
            'userid' => 1,
            'date' => '2021-04-17',
            'from' => '17:00:00',
            'until' => '22:00:00',
            'status' => 1,
            'type' => 1,
        ]);
        $this->insert('{{%day}}', [
            'userid' => 4,
            'date' => '2021-04-17',
            'from' => '11:30:00',
            'until' => '15:15:00',
            'status' => 1,
            'type' => 1,
        ]);
        $this->insert('{{%day}}', [
            'userid' => 2,
            'date' => '2021-04-17',
            'from' => '17:00:00',
            'until' => '22:00:00',
            'status' => 1,
            'type' => 1,
        ]);
        $this->insert('{{%day}}', [
            'userid' => 3,
            'date' => '2021-04-17',
            'from' => '17:30:00',
            'until' => '21:45:00',
            'status' => 1,
            'type' => 1,
        ]);
        $this->insert('{{%day}}', [
            'userid' => 4,
            'date' => '2021-04-17',
            'from' => '17:45:00',
            'until' => '20:45:00',
            'status' => 1,
            'type' => 1,
        ]);
        $this->insert('{{%day}}', [
            'userid' => 5,
            'date' => '2021-04-17',
            'from' => '',
            'until' => '',
            'status' => 1,
            'type' => 2,
        ]);
        $this->insert('{{%day}}', [
            'userid' => 6,
            'date' => '2021-04-17',
            'from' => '17:30:00',
            'until' => '21:00:00',
            'status' => 1,
            'type' => 1,
        ]);
        $this->insert('{{%day}}', [
            'userid' => 7,
            'date' => '2021-04-17',
            'from' => '17:30:00',
            'until' => '22:00:00',
            'status' => 1,
            'type' => 1,
        ]);
        $this->insert('{{%day}}', [
            'userid' => 8,
            'date' => '2021-04-17',
            'from' => '11:30:00',
            'until' => '14:45:00',
            'status' => 1,
            'type' => 1,
        ]);
        $this->insert('{{%day}}', [
            'userid' => 8,
            'date' => '2021-04-17',
            'from' => '17:30:00',
            'until' => '21:45:00',
            'status' => 1,
            'type' => 1,
        ]);
        $this->insert('{{%day}}', [
            'userid' => 9,
            'date' => '2021-04-17',
            'from' => '',
            'until' => '',
            'status' => 1,
            'type' => 0,
        ]);
        $this->insert('{{%day}}', [
            'userid' => 10,
            'date' => '2021-04-17',
            'from' => '',
            'until' => '',
            'status' => 1,
            'type' => 0,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210416_235608_insert_days cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210416_235608_insert_days cannot be reverted.\n";

        return false;
    }
    */
}
