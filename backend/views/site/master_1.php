<?php
use yii\helpers\Html;
$lang_link = str_replace('-', '_', Yii::$app->mycoms->wordtourl(Yii::$app->language));
$title_name = 'title_' . $lang_link;
$description_name = 'description_' . $lang_link;
$main_title_name = 'heading_' . $lang_link;
$base_name = 'basic_' . $lang_link;
$text_name = 'text_' . $lang_link;
$link_name = 'link_'.$lang_link;
$menu_title_name = 'menu_title_'.$lang_link;

$this->title = $main->$title_name;
$description = $main->$description_name;
$this->registerMetaTag(['name' => 'description', 'content' => $description]);
$this->registerLinkTag(['rel'=> 'icon','type'=>'image/png','href'=> Yii::$app->request->baseUrl . '/frontend/web/uploads/master/'.$main->icon]);
$main_title = $main->$main_title_name;
$base = $main->$base_name;
?>
<header class="page-header" style=" ">
    <div class="text-page-header">
        <div class="container" style="display:flex; flex-direction: column;">
                 <?php if($main->menu_option == '0'){ ?>
                
                <nav>    <?=
                    Html::a(' <b> Početna </b>', ['/site/index',
                       // 'page' => $slave->$link_name,
                            // 'subpage' => $slave->$link_name,
                            // 'home' => Yii::$app->mycoms->wordtourl($body->home->link_sr_latn),
                            //'subhome' => Yii::$app->mycoms->wordtourl($body->link_sr_latn),
                            ], ['style' => '', 'class' => 'btn btn-primary', 'title' => 'Izmenite zaglavlje ove stranice']);
                    ?>
                </nav>
                <?php }?>
            <nav>
                <?=
                Html::a('Izmenite zaglavlje stranice:<b>' . $main->$menu_title_name . '</b>', ['/master/update',
                    'id' => $main->id,
                    'mytype'=>'2',
                        // 'subpage' => $slave->$link_name,
                        // 'home' => Yii::$app->mycoms->wordtourl($body->home->link_sr_latn),
                        //'subhome' => Yii::$app->mycoms->wordtourl($body->link_sr_latn),
                        ], ['style' => '', 'class' => 'btn btn-warning', 'title' => 'Izmenite zaglavlje ove stranice']);
                ?>
            </nav>
            <div>
                <h1 class="m-title"><?= $main->$main_title_name; ?></h1>  
            </div>
            <div>
                <?= $main->$text_name; ?>
            </div>
            <nav>
                <?=  Html::a('Dodaj post u ovu stranicu', ['/slave/create','master_id'=>$main->id], 
               ['style' => '', 'class' => 'btn btn-primary', 'title' => '']); ?>
            </nav>
        </div>
    </div>
    <figure class="image-page-header" style="height: 100vh;">
        <?php
         $mypath = \Yii::$app->urlManagerFrontend->baseUrl . '/uploads/master/';
        if ($main->image) {
            ?>
            <?= Html::img($mypath . $main->image, ['alt' => 'myalt', 'title' => '', 'class' => '', 'width' => '100%', 'style' => '    
                            transition: all 2s;
                            width: 100%;
                            height: 100%;
                            object-fit: cover;']) ?>       
            <?php
        }
        ?>
    </figure>       
</header>




<div>
    <?php
    if($main->slaves){
     foreach ($main->slaves as $slave) {
         
         ?>
        <div class="row" id="<?= $slave->$link_name ?>" style="min-height: 50vh;border-bottom: 1px solid gray; border-left: 1px solid gray;">
            <div class="col-lg-6">
                <h2> <?= $slave->$menu_title_name ?></h2>
                <nav>
                    <?=
                    Html::a('Izmenite post: <b>' . $slave->$menu_title_name . '</b>', ['/slave/update',
                        'id' => $slave->id,
                        'mytype'=>'1',
                            // 'subpage' => $slave->$link_name,
                            // 'home' => Yii::$app->mycoms->wordtourl($body->home->link_sr_latn),
                            //'subhome' => Yii::$app->mycoms->wordtourl($body->link_sr_latn),
                            ], ['style' => '', 'class' => 'btn btn-warning', 'title' => 'Izmenite zaglavlje ove stranice']);
                    ?>

                    <?=
                    Html::a(' <b>' . $slave->$menu_title_name . '</b>', ['/site/slave',
                        'page' => $main->$link_name,
                         'subpage' => $slave->$link_name,
                            // 'home' => Yii::$app->mycoms->wordtourl($body->home->link_sr_latn),
                            //'subhome' => Yii::$app->mycoms->wordtourl($body->link_sr_latn),
                            ], ['style' => '', 'class' => 'btn btn-primary', 'title' => 'Izmenite zaglavlje ove stranice']);
                    ?>
                </nav>
                
            </div>
            <div class="col-lg-6">

            </div>
        </div>
    <?php
     }
    }else{
        echo 'nema postova u ovoj stranici';
    }
     ?>
</div>