<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category}}`.
 */
class m190520_002757_create_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255),
            'image_id'=>$this->integer(),


            'status'=>$this->boolean()->defaultValue(0),
            'created_at' => $this->biginteger()->defaultValue(time()),
            'updated_at' => $this->biginteger()->defaultValue(time()),
            'deleted_at'=>$this->bigInteger(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%category}}');
    }
}
