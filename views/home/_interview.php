<?php 
use yii\helpers\Url;
use app\assets\ImageAsset;
$images=ImageAsset::register($this);
?>
<?php 
if(!empty($interview)){

?>
<div class="container-fluid n-p">
      
            <div class="row">
                    <div class="col-lg-12">
                        <div class="container-bg">
                            <div class="container" id="interview_wrapper">
                                    <div class="row">
                                            <div class="col-lg-12">
                                                <h4>
                                                    <a href="#" class="headline float-">
                                                        <span class="dot"></span>
                                                        <?php echo Yii::t('app','Interview')?>
                                                    </a>        
                                                </h4>
                                            </div>
                                            <?php 
                                                
                                            ?>
                                            <?php 
                                                foreach($interview as $item){
                                                    if(!empty($item->newsContents)){
                 
                                                    $content=$item->newsContents[0];
                                                    $link="news/".$content->getSlug();
                                          
                                            ?>
                                            <div class="col-3">
                                                <div class="inverview">
                                                    <a href="<?php echo Url::to([$link]);?>">
                                                        <img src="<?php echo $images->baseUrl."/".$item->thumbnail_image;?>" alt="" class="img-thumbnail">
                                                        <p>
                                                           <?php echo $content->title;?>
                                                        </p>
                                                    </a>
                                                </div>
                                            </div>


                                            <?php   }
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