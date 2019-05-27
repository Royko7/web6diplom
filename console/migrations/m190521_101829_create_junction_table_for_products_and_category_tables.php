<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%products_category}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%products}}`
 * - `{{%category}}`
 */
class m190521_101829_create_junction_table_for_products_and_category_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%products_category}}', [
            'products_id' => $this->integer(),
            'category_id' => $this->integer(),
            'PRIMARY KEY(products_id, category_id)',
        ]);

        // creates index for column `products_id`
        $this->createIndex(
            '{{%idx-products_category-products_id}}',
            '{{%products_category}}',
            'products_id'
        );

        // add foreign key for table `{{%products}}`
        $this->addForeignKey(
            '{{%fk-products_category-products_id}}',
            '{{%products_category}}',
            'products_id',
            '{{%products}}',
            'id',
            'CASCADE'
        );

        // creates index for column `category_id`
        $this->createIndex(
            '{{%idx-products_category-category_id}}',
            '{{%products_category}}',
            'category_id'
        );

        // add foreign key for table `{{%category}}`
        $this->addForeignKey(
            '{{%fk-products_category-category_id}}',
            '{{%products_category}}',
            'category_id',
            '{{%category}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%products}}`
        $this->dropForeignKey(
            '{{%fk-products_category-products_id}}',
            '{{%products_category}}'
        );

        // drops index for column `products_id`
        $this->dropIndex(
            '{{%idx-products_category-products_id}}',
            '{{%products_category}}'
        );

        // drops foreign key for table `{{%category}}`
        $this->dropForeignKey(
            '{{%fk-products_category-category_id}}',
            '{{%products_category}}'
        );

        // drops index for column `category_id`
        $this->dropIndex(
            '{{%idx-products_category-category_id}}',
            '{{%products_category}}'
        );

        $this->dropTable('{{%products_category}}');
    }
}
