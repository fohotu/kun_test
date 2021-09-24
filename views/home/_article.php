<?php 
use Yii;

use yii\helpers\Url;
use app\assets\ImageAsset;
$images=ImageAsset::register($this);

if(!empty($article)){
?>
<div class="container-fluid">
    <div class="row">
        <div class="container">
            <div class="row">
            <div class="col-lg-12">
                <h4>
                    <a href="#" class="headline float-">
                        <span class="dot"></span>
                        <?php echo Yii::t('app','Articles')?>
                    </a>        
                </h4>
            </div>
                <?php 
                    foreach($article as $item){
                        if(!empty($item->newsContents)){
                            $content=$item->newsContents[0];
                            $link="news/".$content->getSlug();//$content->link_year."/".$content->link_month."/".$content->link_day."/".$content->alias;
                  
                ?>        
                            <div class="col-4 article">
                                    <a href="<?php echo Url::to([$link]);?>">
                                        <img src="<?php echo $images->baseUrl."/".$item->thumbnail_image;?>" alt="" class="img-thumbnail">
                                        <p>
                                            <?php echo $content->title;?>
                                        </p>
                                        
                                    </a>  
                                    <p>
                                            <?php echo $content->short_content;?>
                                    </p>  
                            </div>

                <?php 
                        }
                    }
                ?>    
            </div>
        </div>
    </div>
</div>

<?php 
}
?>
