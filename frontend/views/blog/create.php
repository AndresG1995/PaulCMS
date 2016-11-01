<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BlogCms */

$this->title = 'Create Blog Cms';
$this->params['breadcrumbs'][] = ['label' => 'Blog Cms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-cms-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
