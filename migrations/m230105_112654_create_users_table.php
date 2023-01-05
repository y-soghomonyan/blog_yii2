<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m230105_112654_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string(64),
            'name' => $this->string(64),
            'email' => $this->string(64),
            'password' => $this->string(120),
            'user_type' => $this->string(120)->defaultValue('user'),
            'auth_key' =>  $this->string(100),
            'created_at' => $this->dateTime()->defaultValue(Date('Y-m-d H:i:s')),
            'updated_at' => $this->dateTime()->defaultValue(Date('Y-m-d H:i:s')),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users}}');
    }
}



/*
 *
 *
 1. es hramanov stexcum enq migratian
  yii migrate/create create_users_table
 hramany kancheluc heto harcnelu e ha kam che gri yes

2. es hramanov stexcum es tabel
yii migrate



*/
