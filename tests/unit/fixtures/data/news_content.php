<?php 
use yii\helpers\StringHelper as SH;
use yii\helpers\Inflector;
$data=[];
$text_uz="
Узоқ, сўзлар тоғларидан нарида, 
унли ва ундошлар мамлакатида балиқ матнлари яшайди. 
Ҳаммадан узоқда, улар катта тил океанининг семантикаси 
соҳилидаги ҳарфли уйларда яшайдилар. 
Даҳл кичик дарёси бутун мамлакат бўйлаб сузади ва уни 
барча керакли қоидалар билан таъминлайди. 
Бу парадигматик мамлакат, 
унда жумланинг қовурилган аъзолари 
оғзига учиб кетади. 
Ҳатто қудратли тиниш белгиларининг ҳам 
тасвирсиз ҳаёт тарзини олиб борувчи балиқ матнлари 
устидан кучи йўқ. Бир куни, Лорем Ипсум исмли балиқ 
матнининг кичик бир қатори катта грамматика
оламига киришга қарор қилди. 
Буюк Оксмох уни ёвуз вергуллар,
ёввойи саволлар ва маккор нуқта -вергуллар
ҳақида огоҳлантирди, лекин матн чалкашиб кетишига йўл 
қўймади. 
У еттита катта ҳарфни йиғиб, бош ҳарфини белига боғлаб, 
йўлга чиқди. Нишабли тоғларнинг биринчи
чўққисига кўтарилиб, у охирги марта ўз туғилган шаҳри Буквограднинг силуетига, Aлфавит қишлоғининг бошига ва Строчка бўлаги субтитрига қаради. 
Ёноғидан ачинарли риторик савол тушди ва у йўлини давом еттирди. Йўлда қўлёзма матни билан танишдим. У уни огоҳлантирди: 
Менинг мамлакатимда ҳамма нарса бир неча бор қайта ёзилган. Мендан фақат ва префикси қолди. Хавфсиз юртингизга қайтганингиз маъқул . Қўлёзмага бўйсунмаган ҳолда, матнимиз ўз йўлида давом етди. 
Тез орада у маккор компилятор билан учрашди
";
$text_ru="
Далеко-далеко за словесными горами в стране гласных и согласных 
живут рыбные тексты. 
Вдали от всех живут они в буквенных домах 
на берегу Семантика большого языкового океана. 
Маленький ручеек Даль журчит по всей стране и 
обеспечивает ее всеми необходимыми правилами. 
Эта парадигматическая страна, в которой жаренные 
члены предложения залетают прямо в рот. 
Даже всемогущая пунктуация не имеет власти над рыбными текстами,
ведущими безорфографичный образ жизни.
Однажды одна маленькая строчка рыбного 
текста по имени Lorem ipsum решила выйти в 
большой мир грамматики. 
Великий Оксмокс предупреждал ее о злых запятых, 
диких знаках вопроса и коварных точках с запятой, 
но текст не дал сбить себя с толку.
Он собрал семь своих заглавных букв, 
подпоясал инициал за пояс и пустился в дорогу. 
Взобравшись на первую вершину курсивных гор,
бросил он последний взгляд назад, 
на силуэт своего родного города Буквоград,
на заголовок деревни Алфавит и 
на подзаголовок своего переулка Строчка. 
Грустный риторический вопрос скатился по его щеке
и он продолжил свой путь. 
По дороге встретил текст рукопись. 
Она предупредила его:
«В моей стране все переписывается по несколько раз. Единственное, что от меня осталось, это приставка «и». Возвращайся ты лучше в свою безопасную страну». Не послушавшись рукописи, наш текст продолжил свой путь.
 Вскоре ему повстречался коварный составитель
";
$text_oz="Uzoq, so'zlar tog'laridan narida, 
unli va undoshlar mamlakatida baliq matnlari yashaydi. 
Hammadan uzoqda, ular katta til okeanining semantikasi 
sohilidagi harfli uylarda yashaydilar. 
Dahl kichik daryosi butun mamlakat bo'ylab suzadi va uni 
barcha kerakli qoidalar bilan ta'minlaydi. 
Bu paradigmatik mamlakat, 
unda jumlaning qovurilgan a'zolari 
og'ziga uchib ketadi. 
Hatto qudratli tinish belgilarining ham 
tasvirsiz hayot tarzini olib boruvchi baliq matnlari 
ustidan kuchi yo'q. Bir kuni, Lorem Ipsum ismli baliq 
matnining kichik bir qatori katta grammatika
olamiga kirishga qaror qildi. 
Buyuk Oksmox uni yovuz vergullar,
yovvoyi savollar va makkor nuqta -vergullar
haqida ogohlantirdi, lekin matn chalkashib ketishiga yo'l 
qo'ymadi. 
U ettita katta harfni yig'ib, bosh harfini beliga bog'lab, 
yo'lga chiqdi. Nishabli tog'larning birinchi
cho'qqisiga ko'tarilib, u oxirgi marta o'z tug'ilgan shahri Bukvogradning siluetiga, Alfavit qishlog'ining boshiga va Strochka bo'lagi subtitriga qaradi. 
Yonog'idan achinarli ritorik savol tushdi va u yo'lini davom ettirdi. Yo'lda qo'lyozma matni bilan tanishdim. U uni ogohlantirdi: 
Mening mamlakatimda hamma narsa bir necha bor qayta yozilgan. Mendan faqat va prefiksi qoldi. Xavfsiz yurtingizga qaytganingiz ma'qul . Qo'lyozmaga bo'ysunmagan holda, matnimiz o'z yo'lida davom etdi. 
Tez orada u makkor kompilyator bilan uchrashdi";

$lang=[
    'uz'=>$text_uz,
    'oz'=>$text_oz,
    'ru'=>$text_ru
];
$lang_keys=array_keys($lang);

/*
'id' => $this->primaryKey(),
            'title'=>$this->string(128)->notNull(),
            'alias'=>$this->string(128)->notNull(),
            'meta_key'=>$this->string(255),
            'meta_desc'=>$this->text(),
            'short_content'=>$this->text(),
            'full_content'=>$this->text(),
            'news_id'=>$this->integer(11),
            'lang'=>$this->string(10)->defaultValue('uz'),
*/

for($i=0;$i<15;$i++){
    $time=time();
    $j=mt_rand(0,2);
    $title_count=mt_rand(4,10);
    $short_text_count=mt_rand(10,20);
    $index='news'.$i;
    $text=$lang[$lang_keys[$j]];
    $title=SH::truncateWords($text,$title_count);
    $data[$index]=[
        'title'=>$title,
        'alias'=>Inflector::slug($title), 
        'meta_key'=>SH::truncateWords($text,$title_count),   
        'short_content'=>SH::truncateWords($text,$short_text_count),    
        'full_content'=>'images/1.png',
        'lang'=>$lang_keys[$j]
    ];
}

return $data;

?>