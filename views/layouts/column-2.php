<?php

/* @var $this \yii\web\View */
/* @var $content string */
use Yii;
use app\assets\AppAsset;
use app\assets\ImageAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\helpers\Url;

use app\components\sidebar\SideBar;
$b=AppAsset::register($this);
$b2=ImageAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!---->
    <link
  rel="stylesheet"
  href="https://unpkg.com/swiper@7/swiper-bundle.min.css"
/>

<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <!---->
    
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>

    <?php
  
   
/*
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md',
        ],
    ]);*/
    NavBar::begin([
        'brandLabel' => 'kun.<span>uz</span>',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md n-p',
            'id'=>'main-menu',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => $this->params['menu'],
    ]);
    ?>
         <!-- Small button groups (default and split) -->
         <div class="btn-group" id="lang-menu">
                    <button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $this->params['lang'][Yii::$app->language];?>
                    </button>
                    <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?php echo Url::to(['/','language'=>'uz']);?>">Узбекча</a>
                    <a class="dropdown-item" href="<?php echo Url::to(['/','language'=>'oz']);?>">O'zbekcha</a>
                    <a class="dropdown-item" href="<?php echo Url::to(['/','language'=>'ru']);?>">Русский</a>
                    </div>
        </div>
    <?php 
    NavBar::end();
    ?>


</header>

<div class="container">
<div class="row" >
                <div class="col-lg-12" >
                    <div id="scroll">
                        <ul class="nav" id="region">
                            <li class="nav-item menu-title">
                                <a href="#" class="nav-link">Hududlar</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link active">Toshkent</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Qoraqalpog'iston</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Andijon</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Farg'ona</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Namangan</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Samarqand</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Buxoro</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Xorazm</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Surxondaryo</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Qashqadaryo</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Jizzax</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Jizzax</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Jizzax</a>
                            </li>
                        </ul>
                    </div>
                    
                </div>
        </div>
</div>
<?php

if(isset($this->blocks['home_top_page'])){
    echo $this->blocks['home_top_page'];
}
?>

<?php 
if(isset($this->blocks['home_important_page'])){
    echo $this->blocks['home_important_page'];
}
?>
<?php 
if(isset($this->blocks['home_interview'])){
    echo $this->blocks['home_interview'];
}
?>
<?php 
if(isset($this->blocks['home_investigation'])){
    echo $this->blocks['home_investigation'];
}
?>
<?php 
if(isset($this->blocks['home_article'])){
    echo $this->blocks['home_article'];
}
?>

<?php 
if(isset($this->blocks['home_busnes'])){
    echo $this->blocks['home_busnes'];
}
?>


<main role="main" class="flex-shrink-0">
    <div class="container">

        <div class="row">

            
            <div class="col-9">
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
            <div class="col-3">
                 <?php 
                    echo SideBar::widget([
                        'title'=>Yii::t('app','Last news'),
                        'data'=>$this->params['lastNews'],
                        'itemClass'=>'right_item',
                    ]);
                 ?>   
            </div>


        </div>

        
    </div>
</main>

<footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="float-left">&copy; My Company <?= date('Y') ?></p>
        <p class="float-right"><?= Yii::powered() ?></p>
    </div>

  </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
