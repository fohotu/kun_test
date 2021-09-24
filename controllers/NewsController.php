<?php
namespace app\controllers;

use Yii;

use app\models\query\NewsQuery;
use  app\models\News;

class NewsController extends BaseController
{


    public function actionIndex($slug)
    {
        $this->layout="column-2";
        $model= NewsQuery::getInctance()->getByCategory($slug,Yii::$app->language);
        return $this->render('index',['model'=>$model]);        
    }

    public function actionView($year,$month,$day,$slug)
    {

        $this->layout="column-3";
        $model=NewsQuery::getInctance()->view($year,$month,$day,$slug);
        $lastNews=NewsQuery::getInctance()->getLast(Yii::$app->language);
        $selected=NewsQuery::getInctance()->getSelected(Yii::$app->language);
        $moreViewed=NewsQuery::getInctance()->getMoreViewed(Yii::$app->language);


        News::increaseViewCount($model);
        
        return $this->render('view',[
            'model'=>$model,
            'lastNews'=>$lastNews,
            'moreViewed'=>$moreViewed,
            'selected'=>$selected,   
        ]);        
    }



    public function actionAjaxLoad(){
        if(Yii::$app->request->isPost && Yii::$app->request->isAjax){
            $post=Yii::$app->request->post();
            $iden=$post['lastIden'];
            $category='categorycontent4';
            $model=NewsQuery::getInctance()->getExtraData($category,$iden);
            return \yii\helpers\Json::encode($model);
        }else{
            throw new \yii\web\HttpException(404,Yii::t('app','404')); 
        }
        
    }

    
}
