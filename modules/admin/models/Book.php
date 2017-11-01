<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "book".
 *
 * @property integer $id
 * @property string $name
 * @property string $img
 * @property string $author
 * @property string $release_date
 * @property string $attachment_date
 */
class Book extends \yii\db\ActiveRecord
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
        return 'book';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'author'], 'string'],
            [['release_date', 'attachment_date'], 'safe'],
//            [['release_date', 'attachment_date'], 'date'],
            [['release_date', 'attachment_date'], 'default' , 'value' => null],
            [['image'], 'file', 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Book name',
            'image' => 'Image',
            'author' => 'Author',
            'release_date' => 'Release Date',
            'attachment_date' => 'Attachment Date',
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
