<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%news}}`.
 */
class m210916_105219_create_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */

    public function safeUp()
    {
        $this->createTable('{{%news}}',[
           'id' => $this->primaryKey(),
           'created_date'=>$this->integer(11),
           'public_date'=>$this->integer(11),
           'updated_date'=>$this->integer(11),
           'count_of_view'=>$this->integer(11),
           'thumbnail_image'=>$this->string(128),
           'is_deleted'=>$this->integer(1)->defaultValue(0),
           'type'=>$this->string(20)->defaultValue('basic'),
           'category_id'=>$this->integer(11),
           'is_imported'=>$this->integer(1)->defaultValue(0),
           'is_selected'=>$this->integer(1)->defaultValue(0),
        ]);

        $this->addForeignKey('fk-news-category', '{{%news}}', 'category_id', '{{%category}}', 'id','CASCADE');


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%news}}');
    }
}
