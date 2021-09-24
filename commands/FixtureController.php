<?php 
namespace app\commands;
use yii\test\FixtureTrait;
use app\tests\fixtures\CategoryFixture;
use app\tests\fixtures\NewsFixture;
use app\tests\fixtures\CategoryContentFixture;
use app\tests\fixtures\NewsContentFixture;

class Fixture1Controller extends FixtureTrait{
    
    public function fixtures(){
        return [
            CategoryFixture::class,
            NewsFixture::class,
            CategoryContentFixture::class,
            NewsContentFixture::class,
        ];
    }

    public function loadFixtures($fixtures = null){
        parent::loadFixtures();
    }
}

?>