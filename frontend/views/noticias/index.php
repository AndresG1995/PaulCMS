<?php
//
/* @var $this yii\web\View */

use yii\helpers\Html;



?>

<div id="posts" class="container-fluid"> 

    <h1>Noticias</h1>
 

<?php foreach ($noticias as $key => $value): ?> 
    
    <b> <?php echo $key+1;?>) Titulo:</b> <?= Html::a($value->titulo, ['noticia/' . $value->seo_slug], ['class' => 'media-heading title-post']) ?>
                            <!--                    <a class="media-heading title-post" href="#">Your Comment Title</a>-->
                            <h5 class="time-post"> <b>Publicado hace:</b> <?php echo Yii::$app->formatter->asRelativeTime($value->updated_at) ?></h5>
                            
                    <p align="justify"><?= \yii\bootstrap\Html::tag('span', substr(strip_tags($value->detalle), 0, 380) . '...', [ 'data-toggle' => 'tooltip', 'title' => 'Selecciona el enlace de la noticia para leer más..', 'style' => 'cursor:help;']); ?></p>
           
                    <?php endforeach; ?>


    </div> 




    
<div class="row text-center"><?= yii\widgets\LinkPager::widget(['pagination'=>$pagination]); ?></div>