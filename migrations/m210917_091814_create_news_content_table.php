<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%news_content}}`.
 */
class m210917_091814_create_news_content_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%news_content}}', [
            'id' => $this->primaryKey(),
            'title'=>$this->string(128)->notNull(),
            'alias'=>$this->string(128)->notNull(),
            'meta_key'=>$this->string(255),
            'meta_desc'=>$this->text(),
            'short_content'=>$this->text(),
            'full_content'=>$this->text(),
            'news_id'=>$this->integer(11),
            'lang'=>$this->string(10)->defaultValue('uz'),
            'link_year'=>$this->string(4)->notNull(),
            'link_month'=>$this->string(2)->notNull(),
            'link_day'=>$this->string(2)->notNull(),

        ]);

        $this->addForeignKey('fk-news', '{{%news_content}}', 'news_id', '{{%news}}', 'id','CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%news_content}}');
    }
}
