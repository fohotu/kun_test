<?php 
namespace app\components\sidebar;


use yii\base\Widget;
use yii\helpers\Html;


class SideBar extends Widget{
    public $mess;
    public $title;
    public $border=true;
    public $data=null;
    public $itemClass="";


    public function init(){
        parent::init();
       
    }
    
    public function run(){
        return $this->render('list',[
            'title'=>$this->title,
            'data'=>$this->data,
            'itemClass'=>$this->itemClass,
        ]);
    }

}
?>
