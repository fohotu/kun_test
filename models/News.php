<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property int|null $created_date
 * @property int|null $public_date
 * @property int|null $updated_date
 * @property int|null $count_of_view
 * @property string|null $thumbnail_image
 * @property int|null $is_deleted
 * @property string|null $type
 * @property int $category_id
 *
 * @property NewsContent[] $newsContents
 */
class News extends BaseActiveRecord
{
    /**
     * {@inheritdoc}
    */

    const TYPE_BASIC='basic';
    const TYPE_INTERVIEW='interview';
    const TYPE_VIDEO='video';
    const TYPE_PHOTO='photo';
    const TYPE_INVEST='investigation';
    const TYPE_ARTICLE='article';
  

    public static function tableName()
    {
        return '{{%news}}';
    }


    

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_date', 'public_date', 'updated_date', 'count_of_view', 'is_deleted', 'category_id'], 'integer'],
            [['category_id','slug'], 'required'],
            [['thumbnail_image'], 'string', 'max' => 128],
            [['type'], 'string', 'max' => 20],
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
            'public_date' => 'Public Date',
            'updated_date' => 'Updated Date',
            'count_of_view' => 'Count Of View',
            'thumbnail_image' => 'Thumbnail Image',
            'is_deleted' => 'Is Deleted',
            'type' => 'Type',
            'category_id' => 'Category ID',
        ];
    }

    /**
     * Gets query for [[NewsContents]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNewsContents()
    {
        return $this->hasMany(NewsContent::className(), ['news_id' => 'id']);
    }

    public function getCategorys()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }


    public static function increaseViewCount($model){
        $view_sess="view".$model->id;
        if(!Yii::$app->session->get($view_sess)){
            Yii::$app->session->set($view_sess,time());
            return $model->updateCounters(['count_of_view'=>1]);
        }else{
            return false;
        }
        
        
    }


    public function getDateForView(){
        return Date("H:i / d.m.Y",$this->created_date);
    }

    
}
