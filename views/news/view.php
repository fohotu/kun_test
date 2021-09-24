<?php 
use Yii;
use app\components\sidebar\SideBar;
?>
<div class="container">
    <div class="row">
            <div class="col-3">
            <?php 
            echo SideBar::widget([
                'title'=>Yii::t('app','Last news'),
                'data'=>$lastNews,
                'itemClass'=>'left_item',
            ]);
            ?>
            </div>

            <div class="col-6 news-view-wrapper"> 

            <?php 
            if(!empty($model->newsContents)){
            ?>
              <p class="news-date">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-event" viewBox="0 0 16 16">
                            <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                            </svg>
                    </span>
                    <?php echo $model->getDateForView();?>
                    <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                         <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                    </svg>
                          <?php echo $model->count_of_view?>  
                    </span>

                    <div class="share">
                        <button class="share-button">
                            Podelitsya
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-reply-fill" viewBox="0 0 16 16">
                                <path d="M5.921 11.9 1.353 8.62a.719.719 0 0 1 0-1.238L5.921 4.1A.716.716 0 0 1 7 4.719V6c1.5 0 6 0 7 8-2.5-4.5-7-4-7-4v1.281c0 .56-.606.898-1.079.62z"/>
                            </svg>
                        </button>
                        <div class="share-content">
                        <?php
                            echo  \ijackua\sharelinks\ShareLinks::widget(
                                    [
                                        'viewName' => '@app/views/news/shareLinks.php'   //custom view file for you links appearance
                                    ]
                                );
                        ?>
         
                        </div>
                    </div>

         </p>
            <h1><?php echo $model->newsContents[0]['title']?></h1>
            <p><?php echo $model->newsContents[0]['full_content']?></p>
            <?php 
            }
            ?>
        </div>


            <div class="col-3" >
            <?php 
            echo SideBar::widget([
                'title'=>Yii::t('app','Recommended'),
                'data'=>$selected,
                'itemClass'=>'right_item',
            ]);
            ?>

<?php 
            echo SideBar::widget([
                'title'=>Yii::t('app','More viewed'),
                'data'=>$moreViewed,
                'itemClass'=>'right_item',
            ]);
            ?>
            </div>
    </div>

</div>
<?php 
$js="
            let hv=false;
            $('.share-button').hover(
                function(){

                    if(!hv){
                        $('.share-content').slideToggle();
                        hv=true;
                        $(this).addClass('bordered');
                        $('.share-content').addClass('shadowBox');
                    }
                }
            );

            $('.share').mouseleave(
               function(){
                    if(hv){
                        $('.share-content').slideToggle();
                        $('.share-button').removeClass('bordered');
                        hv=false;
                    }
               }
            );
";

$this->registerJs($js);
?>




