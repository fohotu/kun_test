<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category}}`.
 */
class m210916_101713_create_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */

    public function safeUp()
    {
        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'created_date'=>$this->integer(11),
            'updated_date'=>$this->integer(11),
            'is_deleted'=>$this->integer(1)->defaultValue(0),
            'is_menu_item'=>$this->integer(1)->defaultValue(0),
            'parent_id'=>$this->integer(11)->defaultValue(0),
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
