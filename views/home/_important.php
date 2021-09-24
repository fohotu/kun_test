<?php 
use yii\helpers\Url;
use app\assets\ImageAsset;
$images=ImageAsset::register($this);
?>
<?php 

if(!empty($important)){

?>

<div class="container">

<div class="row selected">
            <div class="col-lg-12 ">
                <h4>
                    <a href="#">
                        <span class="dot"></span><?php echo Yii::t('app','Important');?>
                    </a>        
                </h4>

                
            </div>
            <?php 
            if(!empty($important[0]->newsContents)){
                if($important[0]->categorys && !empty($important[0]->categorys->categoryContents)){
                    $category_title=$important[0]->categorys->categoryContents[0]->title;
                    $category_slug=$important[0]->categorys->categoryContents[0]->alias;
                    
                }
                $head=$important[0];
                $content=$important[0]->newsContents[0];
                $link="news/".$content->getSlug();
                if($head->categorys && !empty($head->categorys->categoryContents)){
                    $category_title=$head->categorys->categoryContents[0]->title;
                    $category_slug=$head->categorys->categoryContents[0]->alias;
                    
                }
            ?>
            <div class="col-lg-6 ">
  
               
                <a href="<?php echo Url::to([$link])?>" class="selected-post">
                   <p>
                       <img src="<?php echo $images->baseUrl."/".$head->thumbnail_image;?>" alt="" class="img-thumbnail">
                      
                    </p>
                  
                   <p>
                    <span class="big-new-date">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-event" viewBox="0 0 16 16">
                            <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"></path>
                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"></path>
                        </svg>
                        <?php echo $head->getDateForView();?>
                    </span><br>
                    <span class="big-new-title">
                       <?php echo $content->title;?>
                    </span>
                  
                    </p> 
                </a>
                <?php if(isset($category_title) && isset($category_slug)){?>
                            <a href="<?php echo Url::to(['news/category/'.$category_slug])?>" class="category-link in-main"><span><?php echo $category_title;?></span><a>
                        <?php }?> 
                <p>
                <span class="big-new-content">
                        <?php echo $content->short_content;?>
                    </span>
                </p>
            </div>

            <?php 
            }
            ?>

            <div class="col-lg-6">

                <div class="container">
                    <div class="row">
                    <?php 
                        if(!empty($important)){
                            foreach($important as $key=>$item){
                                if($key==0 || empty($item->newsContents)){
                                    continue;
                                }
                                if(!empty($item->newsContents)){
                                    if($item->categorys && !empty($item->categorys->categoryContents)){
                                        $category_title=$item->categorys->categoryContents[0]->title;
                                        $category_slug=$item->categorys->categoryContents[0]->alias;
                                        
                                    }
                                    $content=$item->newsContents[0];
                            
                                    $link="news/".$content->getSlug();
                                     
                    ?>
                        <div class="col-lg-6">
                            <?php if(isset($category_title) && isset($category_slug)){?>
                            <a href="<?php echo Url::to(['news/category/'.$category_slug])?>" class="category-link"><span><?php echo $category_title;?></span><a>
                            <?php }?>
                            
                            <a href="<?php echo Url::to([$link]);?>" class="selected-post">
                               <p>
                                   <img src="<?php echo $images->baseUrl."/".$item->thumbnail_image;?>" alt="" class="img-thumbnail">
                            </p>
                              
                               <p>
                                <span class="big-new-date">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-event" viewBox="0 0 16 16">
                                        <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"></path>
                                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"></path>
                                    </svg>
                                  <?php echo $item->getDateForView();?>
                                </span><br>
                                <span class="big-new-title">
                                    <?php 
                                        echo $content->title;
                                    ?>
                                </span>
                                </p> 
                            </a>
                        </div>
                    <?php 
                                }
                            }
                        }
                    ?>
            
            

                    </div>

                </div>
            </div>

           

        </div>



</div>

<?php 
}
?>