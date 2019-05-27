<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%products}}`.
 */
class m190520_002733_create_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%products}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255),
            'body' => $this->text(),
            'price'=>$this->integer(),
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
        $this->dropTable('{{%products}}');
    }
}
