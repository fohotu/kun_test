<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category_content}}`.
 */
class m210917_091804_create_category_content_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%category_content}}',[
            'id' => $this->primaryKey(),
            'category_id'=>$this->integer(11),
            'title'=>$this->string(128)->notNull(),
            'alias'=>$this->string(128)->notNull(),
            'lang'=>$this->string(10)->defaultValue('uz'),   
        ]);


        $this->addForeignKey('fk-category', '{{%category_content}}', 'category_id', '{{%category}}', 'id', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%category_content}}');
    }
}
