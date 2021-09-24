<?php 
namespace tests\unit\fixtures;

use yii\test\ActiveFixture;


class CategoryContentFixture extends ActiveFixture{

    public $tableName="{{%category_content}}";
    public $depends=['tests\unit\fixtures\CategoryFixture'];

}

?>