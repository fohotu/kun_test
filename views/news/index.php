<?php

use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\helpers\Url;
use app\assets\ImageAsset;
$images=ImageAsset::register($this);

?>


<div class="container">
    <div class="row">

        <div class="col-12">

            <div class="container-fluid">

                        <div class="row" id="post_list">
                        <?php 

                            foreach($model as $item){
                                $id=$item->id;
                                
                                if(!empty($item->newsContents)){
                                    $data=$item->newsContents[0];
                                    $link="news/".$data->getSlug();
                                ?>    
                                 <div class="col-4 post_item" post="<?php echo $id; ?>">
                                 <p>
                                     <a href="">
                                        <img src="<?php echo $images->baseUrl."/".$item->thumbnail_image;?>" alt="" class="img-thumbnail">              
                                     </a>
                                 </p>    
                                 <h5><a href='<?php echo Url::to([$link])?>'><?php echo $data['title'];?></a></h5>
                                    
                                </div>

                                <?php 
                                }
                                
                            }
                            ?>
                          
                        </div>
                        <?php 
                            if(isset($id)){
                        ?>
                        <hr>
                        <button class="btn btn-primary" id="more"><?php echo Yii::t('app','Load more');?></button>
                        <?php 
                            }
                        ?>
            </div>  

        </div>



    </div>

</div>


<?php 
$url=Url::to(['ajax-load']);

if(isset($id)){
$js="
    $(document).on('click','#more',function(){
        let lastId=$('.post_item:last').attr('post');
        $.ajax({
            method:'POST',
            url:'$url',
            data:{lastIden:lastId},
        }).then(function(res){
            if(res){


            let jd=JSON.parse(res);
            let iden;
            let parent=document.getElementById('post_list');
            jd.forEach(function(el){

                iden=el.id;

                let div=document.createElement('div');
                div.className='col-lg-4 post_item';
                div.setAttribute('post',el.id);

                let p=document.createElement('p');
                let a=document.createElement('a');
                let a2=document.createElement('a');
                let img=document.createElement('img');
                img.className='img-thumbnail';
                img.src='$images->baseUrl'+'/'+el.thumb;
                let h5=document.createElement('h5');
                a2.setAttribute('href',el.link);
                a2.innerText=el.title;
                h5.appendChild(a2);
                a.appendChild(img);
                p.appendChild(a);
                div.appendChild(p);
                div.appendChild(h5);
                parent.appendChild(div);
                       

               
                

            
            });

            }
        });
    });

";

$this->registerJs($js);
}
?>