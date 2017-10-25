<?php

namespace app\modules\admin\models;

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

    public function getCategory()
    {
        return $this->hasOne(Category::className(),['id' => 'idCategory'] );
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idCategory', 'title', 'keywords', 'description', 'post', 'text', 'video'], 'required'],
            [['idCategory', 'post'], 'integer'],
            [['text', 'video'], 'string'],
            [['title', 'keywords', 'description'], 'string', 'max' => 255],
            [['image'], 'file', 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idCategory' => 'Category',
            'title' => 'Title',
            'keywords' => 'Keywords',
            'description' => 'Description',
            'post' => 'Post',
            'text' => 'Text',
            'video' => 'Video',
            'views' => 'Views',
            'image' => 'Image',
        ];
    }

    public  function  upload()
    {
        if($this->validate())
        {
            $path = 'images/store' .  $this->image->baseName . '.' . $this->image->extension;
            $this->image->saveAs($path);
            $this->attachImage($path, true);
            @unlink($path);

            return true;
        } else {
            return false;
        }
    }
}
