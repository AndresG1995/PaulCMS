<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "blog_cms".
 *
 * @property integer $id
 * @property string $titulo
 * @property string $contenido
 * @property integer $publicar
 */
class BlogCms extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'blog_cms';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'titulo', 'contenido', 'publicar'], 'required'],
            [['id', 'publicar'], 'integer'],
            [['titulo'], 'string', 'max' => 30],
            [['contenido'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'titulo' => 'Titulo',
            'contenido' => 'Contenido',
            'publicar' => 'Publicar',
        ];
    }
}
