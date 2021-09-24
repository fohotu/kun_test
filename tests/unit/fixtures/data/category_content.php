<?php 
use yii\helpers\Inflector;
$time=time();
$data=[];


/*

    'id' => $this->primaryKey(),
            'category_id'=>$this->integer(11),
            'title'=>$this->string(128)->notNull(),
            'alias'=>$this->string(128)->notNull(),
            'lang'=>$this->string(10)->defaultValue('uz'),  

*/
$lang=[
    'uz'=>'uz',
    'oz'=>'oz',
    'ru'=>'ru'
];
$lang_keys=array_keys($lang);

for($i=0;$i<15;$i++){
    $index='categoryContent'.$i;
    $j=mt_rand(0,2);
    $data[$index]=[
        'title'=>$index,
        'alias'=>Inflector::slug($index), 
        'lang'=>$lang_keys[$j],    
    ];
}
return $data;

?>
