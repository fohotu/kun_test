<?php

namespace app\controllers;

use Yii;

use app\models\Category;
use app\models\News;
use app\models\query\NewsQuery;

class HomeController extends BaseController
{

 

    public function actionIndex()
    {
       $lang=Yii::$app->language;
    
        $lastNews=NewsQuery::getInctance()->getLast($lang);
        $moreViewed=NewsQuery::getInctance()->getMoreViewed($lang);
        $selected=NewsQuery::getInctance()->getSelected($lang);
        $important=NewsQuery::getInctance()->getImportant($lang);
        $interview=NewsQuery::getInctance()->getByPageType(NEWS::TYPE_INTERVIEW,$lang,4);
        $investigation=NewsQuery::getInctance()->getByPageType(NEWS::TYPE_INVEST,$lang,6);
        $article=NewsQuery::getInctance()->getByPageType(NEWS::TYPE_ARTICLE,$lang,6);



        return $this->render('index',[
            'lastNews'=>$lastNews,
            'moreViewed'=>$moreViewed,
            'selected'=>$selected,
            'important'=>$important,
            'interview'=>$interview,
            'investigation'=>$investigation,
            'article'=>$article,
        ]);

    }


    public function actionT(){
        $ru="Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Вдали от всех живут они в буквенных домах на берегу Семантика большого языкового океана. Маленький ручеек Даль журчит по всей стране и обеспечивает ее всеми необходимыми правилами. Эта парадигматическая страна, в которой жаренные члены предложения залетают прямо в рот. Даже всемогущая пунктуация не имеет власти над рыбными текстами, ведущими безорфографичный образ жизни. Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир грамматики. Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку. Он собрал семь своих заглавных букв, подпоясал инициал за пояс и пустился в дорогу. Взобравшись на первую вершину курсивных гор, бросил он последний взгляд назад, на силуэт своего родного города Буквоград, на заголовок деревни Алфавит и на подзаголовок своего переулка Строчка. Грустный риторический вопрос скатился по его щеке и он продолжил свой путь. По дороге встретил текст рукопись. Она предупредила его: «В моей стране все переписывается по несколько раз. Единственное, что от меня осталось, это приставка «и». Возвращайся ты лучше в свою безопасную страну». Не послушавшись рукописи, наш текст продолжил свой путь. Вскоре ему повстречался коварный составитель";
        $uz="Узоқ, сўзлар тоғларидан нарида, унли ва ундошлар мамлакатида балиқ матнлари яшайди. Ҳаммадан узоқда, улар катта тил океанининг семантикаси соҳилидаги ҳарфли уйларда яшайдилар. Кичкина Даҳл дарёси бутун мамлакат бўйлаб сузади ва уни барча керакли қоидалар билан таъминлайди. Бу парадигматик мамлакат, унда жумланинг қовурилган аъзолари оғзига учиб кетади. Ҳатто қудратли тиниш белгиларининг тасвири бўлмаган ҳаёт тарзини олиб борувчи матнлар устидан кучи ёъқ. Бир куни, Лорем Ипсум исмли балиқ матнининг кичик бир қатори катта грамматика оламига киришга қарор қилди. Буюк Оксмох уни ёвуз вергуллар, ёввойи саволлар ва маккор нуқта -вергуллар ҳақида огоҳлантирди, лекин матн чалкашиб кетишига ёъл қўймади. У эттита катта ҳарфни йиғиб, бош ҳарфини камарига боғлаб, ёълга чиқди. Нишабли тоғларнинг биринчи чўққисига кўтарилиб, у охирги марта туғилган шаҳри Буквограднинг силуетига, Алфавит қишлоғининг бошига ва Строчка бўлаги субтитрига қаради. Ёноғидан ачинарли риторик савол тушди ва у ёълини давом эттирди. Ёълда қўлёзма матни билан танишдим. У уни огоҳлантирди: Менинг мамлакатимда ҳамма нарса бир неча бор қайта ёзилган. Мендан фақат ва префикси қолди. Хавфсиз юртингизга қайтганингиз маъқул ». Қўлёзмага бўйсунмаган ҳолда, матнимиз ўз ёълида давом этди. Тез орада у маккор компилятор билан учрашди";
        $oz="Uzoq, so'zlar tog'laridan narida, unli va undoshlar mamlakatida baliq matnlari yashaydi. Hammadan uzoqda, ular katta til okeanining semantikasi sohilidagi harfli uylarda yashaydilar. Kichkina Dahl daryosi butun mamlakat bo'ylab suzadi va uni barcha kerakli qoidalar bilan ta'minlaydi. Bu paradigmatik mamlakat, unda jumlaning qovurilgan a'zolari og'ziga uchib ketadi. Hatto qudratli tinish belgilarining tasviri bo'lmagan hayot tarzini olib boruvchi matnlar ustidan kuchi yo'q. Bir kuni, Lorem Ipsum ismli baliq matnining kichik bir qatori katta grammatika olamiga kirishga qaror qildi. Buyuk Oksmox uni yovuz vergullar, yovvoyi savollar va makkor nuqta -vergullar haqida ogohlantirdi, lekin matn chalkashib ketishiga yo'l qo'ymadi. U ettita katta harfni yig'ib, bosh harfini kamariga bog'lab, yo'lga chiqdi. Nishabli tog'larning birinchi cho'qqisiga ko'tarilib, u oxirgi marta tug'ilgan shahri Bukvogradning siluetiga, Alfavit qishlog'ining boshiga va Strochka bo'lagi subtitriga qaradi. Yonog'idan achinarli ritorik savol tushdi va u yo'lini davom ettirdi. Yo'lda qo'lyozma matni bilan tanishdim. U uni ogohlantirdi: Mening mamlakatimda hamma narsa bir necha bor qayta yozilgan. Mendan faqat va prefiksi qoldi. Xavfsiz yurtingizga qaytganingiz ma'qul ». Qo'lyozmaga bo'ysunmagan holda, matnimiz o'z yo'lida davom etdi. Tez orada u makkor kompilyator bilan uchrashdi";


    

        $title_ru=\yii\helpers\StringHelper::truncateWords($ru, 8, '');
        $title_uz=\yii\helpers\StringHelper::truncateWords($uz, 8, '');
        $title_oz=\yii\helpers\StringHelper::truncateWords($oz, 8, '');

        $short_ru=\yii\helpers\StringHelper::truncateWords($ru, 20, '');
        $short_uz=\yii\helpers\StringHelper::truncateWords($uz, 20, '');
        $short_oz=\yii\helpers\StringHelper::truncateWords($oz, 20, '');



        $model=\app\models\News::find()->all();
        $text=[
            "uz"=>[
                "title"=>$title_uz,
                "short_content"=>$short_uz,
                "full_content"=>$uz,
                "meta_key"=>$title_uz,
                "meta_desc"=>$short_uz
            ],
            "oz"=>[
                "title"=>$title_oz,
                "short_content"=>$short_oz,
                "full_content"=>$oz,
                "meta_key"=>$title_oz,
                "meta_desc"=>$short_oz
            ],
            "ru"=>[
                "title"=>$title_ru,
                "short_content"=>$short_ru,
                "full_content"=>$ru,
                "meta_key"=>$title_ru,
                "meta_desc"=>$short_ru
            ],
        ];
    
        foreach($model as $item){
            foreach($text as $k=>$v){
                $t=time();
                $r= mt_rand(99,9999);
                $new=new \app\models\NewsContent;
                $new->title=$v['title'];
                $new->alias=\yii\helpers\Inflector::slug($v['title'].$r);
                $new->meta_key=$v['meta_key'];
                $new->meta_desc=$v['meta_desc'];
                $new->short_content=$v['short_content'];
                $new->full_content=$v['full_content'];
                $new->news_id=$item->id;
                $new->lang=$k;
                $new->link_year=Date("Y",$t);
                $new->link_month=Date("m",$t);
                $new->link_day=Date("d",$t);
                $new->save();
                
            }
        }
    }
}
