<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;


use app\models\query\NewsQuery;
use app\models\query\CategoryQuery;


class BaseController extends Controller{
   
    public $layout='column-3';
    protected $languages=[
        "uz"=>"Узбекча",
        "oz"=>"O'zbekcha",
        "ru"=>"Русский",
    ];
  
    public function init(){
        parent::init();
        $this->view->params['menu']=$this->menu();
        $this->view->params['lang']=$this->languages;
        $this->view->params['lastNews']=NewsQuery::getInctance()->getLast(Yii::$app->language);

    }


    protected function menu(){
        $lang=Yii::$app->language;
        $menu=CategoryQuery::getInctance()->getMenu($lang);
        return $menu;
    }
    
}
