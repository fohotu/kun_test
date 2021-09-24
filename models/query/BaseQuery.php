<?php 
namespace app\models\query;

abstract class BaseQuery{


    protected $model;

    private static $instances=[];

    protected function __construct(){}


    protected function __clone(){}
    protected function __wakeup(){}


    final public static function getInctance() 
    {
        $cls=static::class;
        if(!isset(self::$instances[$cls])){
            self::$instances[$cls]=new static();
        }

        return self::$instances[$cls];
    }


    public function find(){
        return $this->model::find();
    }

    public function findOne($condition=[]){
        return $this->model::findOne($condition);
    }

  
  
   
    


}

?>