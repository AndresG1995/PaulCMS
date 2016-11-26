<?php
namespace backend\controllers;

use yii\rest\ActiveController;

class ApiController extends ActiveController
{
    public $modelClass = 'common\models\Noticia';
}
