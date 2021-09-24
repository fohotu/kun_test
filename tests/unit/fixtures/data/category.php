<?php 
$time=time();
$data=[];
for($i=0;$i<15;$i++){
    $index='category'.$i;
    $data[$index]=[
        'created_date'=>$time,
        'updated_date'=>$time,        
    ];
}

return $data;

?>