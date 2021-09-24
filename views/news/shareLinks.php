<?php
use ijackua\sharelinks\ShareLinks;
use \yii\helpers\Html;

/**
 * @var yii\base\View $this
 */

?>



<div class="socialShareBlock">
	<p>
    <?php 
	echo Html::a('Face Book', $this->context->shareUrl(ShareLinks::SOCIAL_FACEBOOK),
		['title' => 'Share to Facebook']) 
    ?>
	
    </p>
    <p>

    <?php
	echo Html::a('Twitter', $this->context->shareUrl(ShareLinks::SOCIAL_TWITTER),
		['title' => 'Share to Twitter']) 
    ?>
    </p>
    <p>
    <?php
	
	echo Html::a('Vkontakte', $this->context->shareUrl(ShareLinks::SOCIAL_VKONTAKTE),
		['title' => 'Share to Vkontakte']) 
    ?>
    </p>
	


</div>