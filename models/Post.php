<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property integer $id
 * @property integer $idCategory
 * @property string $title
 * @property string $keywords
 * @property string $description
 * @property integer $post
 * @property string $text
 * @property string $video
 * @property integer $views
 */
class Post extends \yii\db\ActiveRecord
{

    public $image;

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idCategory', 'title', 'keywords', 'description', 'post', 'text', 'video'], 'required'],
            [['idCategory', 'post', 'views'], 'integer'],
            [['text', 'video'], 'string'],
            [['title', 'keywords', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idCategory' => 'Id Category',
            'title' => 'Title',
            'keywords' => 'Keywords',
            'description' => 'Description',
            'post' => 'Post',
            'text' => 'Text',
            'video' => 'Video',
            'views' => 'Views',
        ];
    }
}
