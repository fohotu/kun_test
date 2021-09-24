<?php 
namespace app\models\query;

use app\models\News;
use app\models\query\CategoryQuery;
use yii\helpers\Url;

class NewsQuery extends BaseQuery{
    
    protected function __construct(){
        $this->model=News::className();
    }


    public function getSelected($language){
        return $this->getByField("news.is_selected",1,$language);
    }

    public function getImportant($language){
        return $this->getByField("news.is_imported",1,$language);
    }

    public function getByPageType($type,$language,$limit){
        return $this->getByField("news.type",$type,$language,$limit);
    }


    public function getExtraData($category_slug,$id){
        $model=$this->t($category_slug,$id);
        $data=false;
        if(!empty($model)){
            foreach($model as $k=>$item){
                $data[$k]['title']=$item->newsContents[0]->title;
                $data[$k]['id']=$item->id;
                $data[$k]['desc']=$item->newsContents[0]->short_content;
                $data[$k]['link']=Url::to(["news/".$item->newsContents[0]->getSlug()]);
                $data[$k]['thumb']=$item->thumbnail_image;
            }
        }
        return $data;
    } 

    public function getByCategory($slug,$language){
        $category=CategoryQuery::getInctance()
        ->find()
        ->joinWith([
            'categoryContents'=>function($query) use($slug){
                $query->andWhere(['alias'=>$slug]);
            }
        ])->one();

        $data=false;
        if($category){
            $data=$this->getByField('news.category_id',$category->id,$language);
        }

       
        return $data;

        return $this->getByField("news.category_id",$category,$language);
    }

    public function getLast($language){
        return $this->getByOrder("created_date DESC",$language);
    }

    public function getMoreViewed($language){
        return $this->getByOrder("count_of_view DESC",$language);
    }

    public function view($year,$month,$day,$slug){
   
        return $this->find()
        ->select([
            'news.id',
            'news.public_date',
            'news.created_date',
            'news.count_of_view',
            'news.thumbnail_image',
            'news_content.alias',
            'news_content.title',
            'news_content.short_content',
        ])
        ->where([
            'news.is_deleted'=>0,
        ])
        ->joinWith([
            'newsContents'=>function($query) use($year,$month,$day,$slug){
                $query->andWhere([
                    'link_year'=>$year,
                    'link_month'=>$month,
                    'link_day'=>$day,
                    'alias'=>$slug
                ]);
            },
        ])->one();
            
    }

    private function getByOrder($order,$lang,$limit=8){
        $data=$this->find()
        ->select([
            'news.id',
            'news.public_date',
            'news.created_date',
            'news.count_of_view',
            'news.thumbnail_image',
            'news_content.alias',
            'news_content.title',
            'news_content.link_year',
            'news_content.link_month',
            'news_content.link_day',
            'news_content.short_content',
        ])
   
        ->joinWith([
            'newsContents'=>function($query) use($lang){
                $query->andWhere(['lang'=>$lang]);
            },
        ])
        ->where([
            'news.is_deleted'=>0,
        ])
        ->orderBy($order)
        ->limit($limit)
        ->all();
        return $data;
    }

    private function getByField($field,$value,$lang,$limit=5){
        $data=$this->find()
        ->select([
            'news.id',
            'news.public_date',
            'news.created_date',
            'news.count_of_view',
            'news.thumbnail_image',
            'news.category_id',
            'category.created_date',
            'news_content.alias',
            'news_content.title',
            'news_content.link_year',
            'news_content.link_month',
            'news_content.link_day',
            'news_content.short_content',
        ])
        ->joinWith([
            'newsContents'=>function($query) use($lang){
                $query->andWhere(['news_content.lang'=>$lang]);
            },
        ])
        ->joinWith([
            "categorys"=>function($query) use($lang){
                $query->joinWith([
                    'categoryContents'=>function($query) use($lang){
                        $query->andWhere(['category_content.lang'=>$lang]);
                    }
                ]);
            },
        ])
        ->where([
            'news.is_deleted'=>0,
            $field=>$value,
            
        ])
        ->limit($limit)
        ->all();
        return $data;
    }

/*
    private function getByType($lang,$type="basic",$limit=4){
        $data=$this->find()
        ->select([
            'news.id',
            'news.public_date',
            'news.created_date',
            'news.count_of_view',
            'news.thumbnail_image',
            'news.category_id',
            'category.created_date',
            'news_content.alias',
            'news_content.title',
            'news_content.link_year',
            'news_content.link_month',
            'news_content.link_day',
            'news_content.short_content',
        ])
        ->joinWith([
            'newsContents'=>function($query) use($lang){
                $query->andWhere(['news_content.lang'=>$lang]);
            },
        ])
        ->joinWith([
            "categorys"=>function($query) use($lang){
                $query->joinWith([
                    'categoryContents'=>function($query) use($lang){
                        $query->andWhere(['category_content.lang'=>$lang]);
                    }
                ]);
            },
        ])
        ->where([
            'news.is_deleted'=>0,
            'news.type'=>$type,
        ])
        ->limit($limit)
        ->all();
        return $data;
    }
*/


    private function t($category_slug,$id,$limit=5){
        $model=$this->find()
        ->select([
            'news.id',
            'news.public_date',
            'news.created_date',
            'news.count_of_view',
            'news.thumbnail_image',
            'news_content.alias',
            'news_content.title',
            'news_content.short_content',
        ])
        ->joinWith([
            'newsContents',
            "categorys"=>function($query) use($category_slug){
                    $query->joinWith([
                        'categoryContents'=>function($query) use($category_slug){
                            $query->andWhere([
                                'category_content.alias'=>$category_slug]);
                        }
                    ]);
            },
            
        ])                
        ->where("news.id > $id")
        ->limit($limit)
        ->all();

        return $model;
    }


    





}