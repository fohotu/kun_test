<?php 
namespace app\models\query;

use app\models\Category;

class CategoryQuery extends BaseQuery{

    //protected $model;
    protected function __construct(){
        $this->model=Category::className();
    }

    public function getMenu($lang){
        $menu=$this->getMenuFromDb($lang);
        if(empty($menu)){
           return $menu; 
        }
        return $this->renderMenu($menu);
    }


    protected function renderMenu($arr,$parent_id = 0){
        $menu=[];
        /*
        
        https://webformyself.com/vyvod-mnogourovnevogo-menyu-s-neogranichennym-urovnem-vlozhennosti/
        
        */

        if(empty($arr[$parent_id])) {
            return;
           }
           for($i = 0; $i < count($arr[$parent_id]);$i++) {   
             
                $menu[$arr[$parent_id][$i]['id']] = [
                    // 'active' => $activeId === $category['id'],
                        'label' => $arr[$parent_id][$i]['title'],
                        'url' => \yii\helpers\Url::to(['/news/category/'.$arr[$parent_id][$i]['slug']]),//'/news/category/'.$arr[$parent_id][$i]['title'],
                        'items' => $this->renderMenu($arr,$arr[$parent_id][$i]['id']),
                ];
           }
           return $menu;
    }


    protected function getMenuFromDb($lang){
        $result=[];
        $menu=$this->find()
        ->select(['category.id','category.parent_id','category_content.title','category_content.alias'])
        ->leftJoin('category_content','category_content.category_id=category.id')
        ->where([
            'category.is_menu_item'=>1,
            'category.is_deleted'=>0,
            
        ])
        ->with([
            'categoryContents'=>function($query) use($lang){
                $query->andWhere(['lang'=>$lang]);
            },
        ])
        ->all();
 
        if(!empty($menu)){
            foreach($menu as $key=>$item){
                $data=[];
                if(empty($result[$item->parent_id])){
                    $result[$item->parent_id]=[];
                }
                if(!empty($item->categoryContents)){
                        $data['id']=$item->id;
                        $data['title']=$item->categoryContents[0]->title;
                        $data['parent_id']=$item->parent_id;   
                        $data['slug']=$item->categoryContents[0]->alias;   
                        $result[$item->parent_id][]=$data;    
                }
             
            }
        }


        return $result;
    }





}
?>