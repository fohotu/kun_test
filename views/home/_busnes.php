<?php 
if(!empty($article)){
?>
<div class="container-fluid" style="display:none">
    <div class="row">
        <div class="container">
            <div class="row">
                <?php 
                    foreach($article as $item){
                        if(!empty($item->newsContents)){
                            $content=$item->newsContents[0];
                            $link="news/".$content->getSlug();                  
                ?>        
                            <div class="col-4">
                                    <a href="/">
                                        <img src="/assets/f5f4f71f/images/1.jpg" class="img-thumbnail" alt="">
                                        <p>
                                            <?php echo $content->title;?>
                                        </p>
                                        <p>
                                            <?php echo $content->short_content;?>
                                        </p>
                                    </a>    
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
