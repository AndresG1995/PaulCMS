<?php

use kartik\alert\AlertBlock;
use yii\helpers\ArrayHelper;
use common\widgets\Alert;
?>

<div class="container-fluid">


 <?= Alert::widget() ?>
    
    <h1><?=
        ArrayHelper::getValue($noticia, function ($noticia, $defaultValue) {
            return $noticia[0]['n_ti'];
        });
        ?></h1>



    Categoría: <?=
        ArrayHelper::getValue(common\models\Categoria::findOne(['id'=>ArrayHelper::getValue($noticia, function ($noticia, $defaultValue) {
            return $noticia[0]['n_cat'];
        })]), 'categoria')
        ?><br>
        
    Fecha de publicacion: <?=
    ArrayHelper::getValue($noticia, function ($noticia, $defaultValue) {
        return $noticia[0]['n_creat'];
    });
        ?><br>    


    Publicado por <?=
    ArrayHelper::getValue(\dektrium\user\models\User::findOne(['id'=>ArrayHelper::getValue($noticia, function ($noticia, $defaultValue) {
        return $noticia[0]['n_cre'];
    })]), 'username')
    ?><br>

    <hr><br>


    <?=
    ArrayHelper::getValue($noticia, function ($noticia, $defaultValue) {
        return $noticia[0]['n_de'];
    });
    ?>


    
    </div>

