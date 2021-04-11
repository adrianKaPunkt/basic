<?php

use yii\db\Migration;

/**
 * Class m210409_005816_insert_users
 */
class m210409_005816_insert_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        //passwort = hallohallo
        $this->insert('{{%user}}', [
            'username' => 'Adrian',
            'firstname' => 'Adrian',
            'email' => 'adriank@gmx.de',
            'password_hash' => '$2y$13$o0Eg0HQlmV97QfJAutJF..OnYpmvxfYVD8SjTToFUJ9CWEx1mXGaa',
            'auth_key' => 'Dd4hFZmm0osDme61mfHOojX4KEHikNvf',
            'access_token' => '',
        ]);
        $this->insert('{{%user}}', [
            'username' => 'Matthias',
            'firstname' => 'Matthias',
            'email' => 'matthias@mook-group.de',
            'password_hash' => '$2y$13$2Q1/ZrsVT1Ynrmvs4wfIq.UiNXOiNxdVq6oO0avu.eCDQEtPD3Ldy',
            'auth_key' => 'Ljz3D47Ae8VhM58pOGSBI_FzzemsQDUp',
            'access_token' => '',
        ]);
        $this->insert('{{%user}}', [
            'username' => 'Zizi',
            'firstname' => 'Ziver',
            'email' => 'ziver538@gmail.com',
            'password_hash' => '$2y$13$W.Iz.z.5x3w88I8nzlHcw.MNe.SCon2Q71kVZWFrUHduiZiYOFSoe',
            'auth_key' => 'fgEJ713Tf1ogyEIOj9cXLz_VVzQ5rE7j',
            'access_token' => '',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('{{%user}}', ['email' => 'adriank@gmx.de']);
        $this->delete('{{%user}}', ['email' => 'matthias@mook-group.de']);
        $this->delete('{{%user}}', ['email' => 'ziver538@gmail.com']);
    }
}
