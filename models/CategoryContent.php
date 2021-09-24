<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category_content".
 *
 * @property int $id
 * @property int|null $category_id
 * @property string $title
 * @property string $alias
 * @property string|null $lang
 *
 * @property Category $category
 */
class CategoryContent extends BaseActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%category_content}}';

    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id'], 'integer'],
            [['title', 'alias'], 'required'],
            [['title', 'alias'], 'string', 'max' => 128],
            [['lang'], 'string', 'max' => 10],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'title' => 'Title',
            'alias' => 'Alias',
            'lang' => 'Lang',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
}
