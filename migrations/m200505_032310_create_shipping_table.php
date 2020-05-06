<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%shipping}}`.
 */
class m200505_032310_create_shipping_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%shipping}}', [
            'id' => $this->primaryKey(),
            "order_id"=>\yii\db\Schema::TYPE_INTEGER,
            "name"=>\yii\db\Schema::TYPE_TEXT,
            "phone"=>\yii\db\Schema::TYPE_STRING,
            "address"=>\yii\db\Schema::TYPE_STRING,
            "created"=>\yii\db\Schema::TYPE_TIMESTAMP,
            "updated"=>\yii\db\Schema::TYPE_TIMESTAMP,

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%shipping}}');
    }
}
