<?php

use yii\db\Migration;

class m160218_085412_create_table_user extends Migration
{
    public function up()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'password' => $this->string()->notNull(),
            'role' => $this->smallInteger()->defaultValue(1),
            'authKey' => $this->string(),
            'token' => $this->string(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->timestamp()
        ]);
    }

    public function down()
    {
        $this->dropTable('user');
    }
}
