<?php

use yii\db\Migration;

class m160218_085421_create_table_link_social extends Migration
{
    public function up()
    {
        $this->createTable('link_social', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'link' => $this->string()->notNull(),
            'status' => $this->smallInteger()->defaultValue(0),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->timestamp()
        ]);
    }

    public function down()
    {
        $this->dropTable('link_social');
    }
}
