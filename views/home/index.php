
<?php 



$this->beginBlock('home_top_page');

echo $this->render('_top',[
    'lastNews'=>$lastNews,
    'moreViewed'=>$moreViewed,
    'selected'=>$selected,
]);

$this->endBlock('home_top_page');
?>


<?php 
$this->beginBlock('home_important_page');
    
echo $this->render('_important',['important'=>$important]);

$this->endBlock('home_important_page')
?>


<?php 
$this->beginBlock('home_interview');
    
echo $this->render('_interview',['interview'=>$interview]);

$this->endBlock('home_interview');
?>



<?php 
$this->beginBlock('home_investigation');
    
echo $this->render('_investigation',['investigation'=>$investigation]);

$this->endBlock('home_investigation');
?>




<?php 
$this->beginBlock('home_article');
    
echo $this->render('_article',['article'=>$article]);

$this->endBlock('home_article');
?>


<?php 
$this->beginBlock('home_busnes');
    
echo $this->render('_busnes',['article'=>$article]);

$this->endBlock('home_busnes');
?>