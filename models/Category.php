<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property int|null $created_date
 * @property int|null $updated_date
 * @property int|null $is_deleted
 * @property int|null $is_menu_item
 * @property int|null $parent_id
 *
 * @property CategoryContent[] $categoryContents
 */
class Category extends BaseActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%category}}';
        
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_date', 'updated_date', 'is_deleted', 'is_menu_item', 'parent_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_date' => 'Created Date',
            'updated_date' => 'Updated Date',
            'is_deleted' => 'Is Deleted',
            'is_menu_item' => 'Is Menu Item',
            'parent_id' => 'Parent ID',
        ];
    }

    /**
     * Gets query for [[CategoryContents]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryContents()
    {
        return $this->hasMany(CategoryContent::className(), ['category_id' => 'id']);
    }

 
}
