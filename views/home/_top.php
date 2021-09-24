<?php 
use yii\helpers\Url;
use app\assets\ImageAsset;
$images=ImageAsset::register($this);
?>







<div class="container">
<div class="row">
            <div class="col-lg-9">
                <div class="container">




                    <div class="row">
                        <div class="col-lg-12 big-main">
                            <?php 
                            if(!empty($moreViewed) && !empty($moreViewed[0]->newsContents)){
                                $head=$moreViewed[0];
                                $content=$moreViewed[0]->newsContents[0];
                                $date=$head->getDateForView();
                                $link="news/".$content->getSlug();
               
        
                            ?>
                            <div class="big-news">

                                <a href="<?php echo Url::to([$link])?>">
                                    <p class="news-thumb">
                                        <img src="<?php echo $images->baseUrl."/".$head->thumbnail_image;?>" class="" alt="" >
                                    </p>
                                    <p>
                                        <span class="big-new-date">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-event" viewBox="0 0 16 16">
                                                <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                                                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                            </svg>
                                            <?php echo $date;?>
                                        </span>
                                        <span class="big-new-title">
                                            <?php echo $content->title;?>
                                          </span>
                                        <span class="big-new-content">
                                                <?php echo $content->short_content;?>
                                        </span>
                                    </p>
                                </a>
                            </div>
                            <?php 
                            }
                            ?> 
                        </div>


                        <!------>
                        <?php
                    
                            if(!empty($moreViewed) && !empty($moreViewed[0]->newsContents)){
                                foreach($moreViewed as $key=>$item){
                                   
                                    if($key==0 || empty($item->newsContents)){
                                        continue;
                                    }      
                                
                                $content=$item->newsContents[0];
                                $date=$item->getDateForView();

                                $link="news/".$content->getSlug();
                              
                        ?>    


                        <div class="col-lg-6 big-next">
                            <div class="big-news">
                                <a href="<?php echo Url::to([$link])?>">
                                    <p class="news-thumb">
                                        <img src="<?php echo $images->baseUrl."/".$item->thumbnail_image;?>" class="" alt="" >
                                    </p>
                                    <p>
                                        <span class="big-new-date">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-event" viewBox="0 0 16 16">
                                                <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                                                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                            </svg>
                                            <?php echo $date;?>
                                        </span>
                                        <span class="big-new-title">
                                            <?php echo $content->title;?>
                                        </span>
                                      
                                    </p>
                                </a>
                            </div>

                        </div>


                        <?php   
                                }
                            }
                        ?>




                        <div class="col-lg-12">
                            <p class="text-right all-news">
                                <a href="#">Barchasi</a>
                            </p>
                        </div>

                        <!------>


                    </div>


                    <?php 
                        if(!empty($selected)){
                    ?>        
                    <div class="row selected">
                        <div class="col-lg-12 ">
                            <h4>
                                <a href="#">
                                    <span class="dot"></span>
                                    <?php echo Yii::t('app','Selected')?>
                                </a>        
                            </h4>

                            
                        </div>

                        <?php 
                            foreach($selected as $item){
                                if(!empty($item->newsContents)){
                                    if($item->categorys && !empty($item->categorys->categoryContents)){
                                        $category_title=$item->categorys->categoryContents[0]->title;
                                        $category_slug=$item->categorys->categoryContents[0]->alias;
                                        
                                    }   
                                $content=$item->newsContents[0];
                                $date=$item->getDateForView();

                                $link="news/".$content->getSlug();
                              
                        ?>
                        <div class="col-lg-4">
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
                                        <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                    </svg>
                                    <?php echo $date?>
                                </span></br>
                                <span class="big-new-title">
                                    <?php echo $content->title?>
                                </span>
                                </p> 
                            </a>
                        </div>


                        <?php 
                                }
                            }
                        
                        ?>


                        





                    </div>


                    <?php 
                        }
                    ?>






                
                </div>


                
            </div>
            <div class="col-lg-3">
            <?php             
               
            
                echo app\components\sidebar\SideBar::widget([
                    'title'=>Yii::t('app','Last news'),
                    'data'=>$lastNews,
                ]);
            ?>            

                <div id="sidebar-last-news" style="display:none"> 
                    <h4>
                        <a href="#">
                            <span></span><?php echo Yii::t('app','Last news')?>
                        </a>        
                    </h4>

                    <ul class="list-unstyled">
                        <?php 
                            if(!empty($lastNews)){
                                foreach($lastNews as $news){
                                    if(isset($news->newsContents[0])){
                                        $dataNews=$news->newsContents[0];
                                        $date=$news->getDateForView();
                                        $link="news/".$dataNews->getSlug();
                              
                       ?>

                        <li>
                          <a href="<?php echo UrL::to([$link])?>">
                                <p class="news-date">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-event" viewBox="0 0 16 16">
                                            <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                          </svg>
                                    </span>
                                    <?php echo $date;?>
                                </p>
                                <p class="news-title">
                                   <?php echo $dataNews['title'];?>
                                </p>
                            </a>
                        </li>

                        <?php   
                                    }
                                }
                            }
                        ?>

                        

                          <p id="sidebar-more">
                              <a href="#">
                                Ko'proq yangiliklar 
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                </svg>
                              </a>
                          </p>

                    </ul>
                </div>
                
            </div>
        </div>
</div>