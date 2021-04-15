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
            'lastname' => 'Kocelj',
            'email' => 'adriank@gmx.de',
            'role' => 1,
            'restaurant' => 2,
            'password_hash' => '$2y$13$o0Eg0HQlmV97QfJAutJF..OnYpmvxfYVD8SjTToFUJ9CWEx1mXGaa',
            'auth_key' => 'Dd4hFZmm0osDme61mfHOojX4KEHikNvf',
            'access_token' => '',
        ]);
        $this->insert('{{%user}}', [
            'username' => 'Matthias',
            'firstname' => 'Matthias',
            'lastname' => 'Würzberger',
            'email' => 'matthias@mook-group.de',
            'role' => 0,
            'restaurant' => 2,
            'password_hash' => '$2y$13$2Q1/ZrsVT1Ynrmvs4wfIq.UiNXOiNxdVq6oO0avu.eCDQEtPD3Ldy',
            'auth_key' => 'Ljz3D47Ae8VhM58pOGSBI_FzzemsQDUp',
            'access_token' => '',
        ]);
        $this->insert('{{%user}}', [
            'username' => 'Zizi',
            'firstname' => 'Ziver',
            'lastname' => 'Direk',
            'email' => 'ziver538@gmail.com',
            'role' => 2,
            'restaurant' => 2,
            'password_hash' => '$2y$13$W.Iz.z.5x3w88I8nzlHcw.MNe.SCon2Q71kVZWFrUHduiZiYOFSoe',
            'auth_key' => 'fgEJ713Tf1ogyEIOj9cXLz_VVzQ5rE7j',
            'access_token' => '',
        ]);
        $this->insert('{{%user}}', [
            'username' => 'Joe',
            'firstname' => 'Mingmonkone',
            'lastname' => 'Southamavong',
            'email' => 'mingmon@web.de',
            'role' => 3,
            'restaurant' => 2,
            'password_hash' => '$2y$13$6jMYhNUUwgirEshk5rGx5OVmTG0OaYQxlwVawKQ.sE/nMv2kGxPC6',
            'auth_key' => '-S3vJDwmsqdPNj5VLrb_kSOD3xiwS2eb',
            'access_token' => '',
        ]);
        $this->insert('{{%user}}', [
            'username' => 'Andreea',
            'firstname' => 'Andreea',
            'lastname' => 'Vasilescu',
            'email' => 'andreea@icloud.de',
            'role' => 2,
            'restaurant' => 2,
            'password_hash' => '$2y$13$uNb4KUeX29.2hktJz6ycGe7HhEqkdG87pXdTeZMtiGt8XTeWKS0Sa',
            'auth_key' => 'F-IzSXSHNr6nMBBfaioLLOB-SMd2y9Hp',
            'access_token' => '',
        ]);
        $this->insert('{{%user}}', [
            'username' => 'Taos',
            'firstname' => 'Aziz',
            'lastname' => 'Taos',
            'email' => 'taos@icloud.de',
            'role' => 2,
            'restaurant' => 2,
            'password_hash' => '$2y$13$8u5Kg.IHSOiPbGeziOOWfOIzWt07nRyuV1JqiVfUeUoKKkN6kv24a',
            'auth_key' => 'aXmRcD6nm5wUEq5_7Mz3rlmOca7GVy01',
            'access_token' => '',
        ]);
        $this->insert('{{%user}}', [
            'username' => 'Natasa',
            'firstname' => 'Natalja',
            'lastname' => 'Mundt',
            'email' => 'natalja5@web.de',
            'role' => 2,
            'restaurant' => 2,
            'password_hash' => '$2y$13$UFgx7u8C0XkQa6jdXmnNM.RojO654/4mMpbXJQWUbNp7LhCl0JIwy',
            'auth_key' => 'aOUkYnYBJea4GSCZbzjtSrninldp698J',
            'access_token' => '',
        ]);
        $this->insert('{{%user}}', [
            'username' => 'Civi',
            'firstname' => 'Abbas',
            'lastname' => 'Civi',
            'email' => 'abbas65@gmx.net',
            'role' => 2,
            'restaurant' => 2,
            'password_hash' => '$2y$13$/ldTagNQiLA.cKTfDFdnnOC5WYcP4Rac.P7xuWkmEq5uG6EfQsDiS',
            'auth_key' => '1fKZg70upLtnK_imBp-z_zAOHMzvD1Di',
            'access_token' => '',
        ]);
        $this->insert('{{%user}}', [
            'username' => 'Ivo',
            'firstname' => 'Ivo',
            'lastname' => 'Bulum',
            'email' => 'bulum.ivo@vjesti.hr',
            'role' => 3,
            'restaurant' => 2,
            'password_hash' => '$2y$13$pTJEX3PPuP5s/XChikkaAeZwO/a/abt7d5bMo6S1XvS5.4jEPVAJ2',
            'auth_key' => '9DMCNN-ljAJ9v951b0QVxalZDICo6cjO',
            'access_token' => '',
        ]);
        $this->insert('{{%user}}', [
            'username' => 'Julius',
            'firstname' => 'Julius',
            'lastname' => 'Sondergeld',
            'email' => 'julius_sondergeld@icloud.com',
            'role' => 1,
            'restaurant' => 2,
            'password_hash' => '$2y$13$X5PkU7zI0ynDQEJMA4c6veVOp.uv/mCAaY0kSlVGMnLchxg0R8rwK',
            'auth_key' => 'tWfPnp4vj3XavIzYlBoIsDfQcV1rS039',
            'access_token' => '',
        ]);
        $this->insert('{{%user}}', [
            'username' => 'Andre',
            'firstname' => 'Andre',
            'lastname' => 'Grunert',
            'email' => 'grunert@web.de',
            'role' => 4,
            'restaurant' => 2,
            'password_hash' => '$2y$13$mq/fSHRiNPs.P5JxdmLe7.1XSkF6zD3/zYwFhI66kE3lc8OGKJlwi',
            'auth_key' => '0Lq540Pw9Q2mVA6MP62q9zr-ACIOS1sk',
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
