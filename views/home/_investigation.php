<?php 
use yii\helpers\Url;
use app\assets\ImageAsset;
$images=ImageAsset::register($this);
?>
<?php 
if(!empty($investigation)){
   
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
                <div class="container ">
                        <div class="row">
                    
                                <?php 
                                    if(!empty($investigation[0]->newsContents[0])){
                                        $head=$investigation[0];
                                        $content=$investigation[0]->newsContents[0];
                                        $link="news/".$content->link_year."/".$content->link_month."/".$content->link_day."/".$content->alias;
                                        
                                          if($head->categorys && !empty($head->categorys->categoryContents)){
                                            $category_title=$head->categorys->categoryContents[0]->title;
                                            $category_slug=$head->categorys->categoryContents[0]->alias;
                                            
                                        }
                                        
                               ?>
                                 
                                 <div class="col-6 investigation">
                                 
                                    
                                    </a><a href="<?php echo Url::to([$link])?>" class="selected-post">
                                    <p>
                                        <img src="<?php echo $images->baseUrl."/".$head->thumbnail_image;?>" alt="" class="img-thumbnail">
                                    </p>
                                    
                                    <p>
                                        <span class="big-new-title">
                                        <?php echo $content->title;?>
                                        </span>
                                      
                                        </p> 
                                    </a>
                                </div>


                                 <?php        
                                    }
                                  
                                ?> 

                          

                            <div class="col-6 investigation-child">
                            <?php 
                                foreach($investigation as $key=>$item){
                                    if($key==0 || empty($item->newsContents)){
                                        continue;
                                    }
                                    $content=$item->newsContents[0];
                                    $link="news/".$content->getSlug();
                                    
                            ?>  
                                    <div class="container-fluid">
                                        <a href="<?php echo Url::to([$link]);?>">

                                            <div class="row">
                                                <div class="col-4">
                                                    <img  class="img-thumbnail" src="<?php echo $images->baseUrl."/".$item->thumbnail_image;?>" alt="">
                                                </div>
                                                <div class="col-8">
                                                    <?php 
                                                        echo $content->title;
                                                    ?>
                                                </div>
                                            </div>

                                        </a>
                                       
                                    </div>

                            <?php 
                                    }

                                
                            ?>
                            </div>
                        </div>
                </div>
        </div>
    </div>

</div>

<?php 
    
}
?>