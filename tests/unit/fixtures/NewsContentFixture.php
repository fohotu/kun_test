<?php 
namespace tests\unit\fixtures;

use yii\test\ActiveFixture;


class NewsContentFixture extends ActiveFixture{

    public $tableName="{{%news_content}}";
    public $depends=['tests\unit\fixtures\NewsFixture'];

}

?>