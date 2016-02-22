<?php

use yii\db\Migration;

class m160219_070031_create_table_home_image extends Migration
{
    public function up()
    {
        $this->createTable('home_image', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'description' => $this->text(),
            'image' => $this->string()->defaultValue('empty.png'),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->timestamp()
        ]);
    }

    public function down()
    {
        $this->dropTable('home_image');
    }
}
