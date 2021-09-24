<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "news_content".
 *
 * @property int $id
 * @property string $title
 * @property string $alias
 * @property string|null $meta_key
 * @property string|null $meta_desc
 * @property string|null $short_content
 * @property string|null $full_content
 * @property int|null $news_id
 * @property string|null $lang
 *
 * @property News $news
 */
class NewsContent extends BaseActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%news_content}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'alias'], 'required'],
            [['meta_desc', 'short_content', 'full_content'], 'string'],
            [['news_id'], 'integer'],
            [['title', 'alias'], 'string', 'max' => 128],
            [['meta_key'], 'string', 'max' => 255],
            [['lang'], 'string', 'max' => 10],
            [['news_id'], 'exist', 'skipOnError' => true, 'targetClass' => News::className(), 'targetAttribute' => ['news_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'alias' => 'Alias',
            'meta_key' => 'Meta Key',
            'meta_desc' => 'Meta Desc',
            'short_content' => 'Short Content',
            'full_content' => 'Full Content',
            'news_id' => 'News ID',
            'lang' => 'Lang',
        ];
    }

    /**
     * Gets query for [[News]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNews()
    {
        return $this->hasOne(News::className(), ['id' => 'news_id']);
    }


    public function getSlug(){
        return $this->link_year.'/'.$this->link_month.'/'.$this->link_day.'/'.$this->alias;
    }
}
