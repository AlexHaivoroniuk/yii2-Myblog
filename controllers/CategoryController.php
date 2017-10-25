<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 24.10.17
 * Time: 21:59
 */

namespace app\controllers;


use app\models\Post;
use yii\web\Controller;
use Yii;
use app\models\Lesson;
use yii\data\ActiveDataProvider;
use app\models\Category;
use app\controllers\CustomController;

class CategoryController extends  CustomController
{
    public function actionView()
    {

        $categoryId = (int) Yii::$app->request->get('id');
        $category = Category::findOne($categoryId);
        $this->setMeta('My blog | '. $category->title , $category->keywords, $category->description);

        $query = Post::find();
        $query->andWhere(['idCategory' => $categoryId]);
        $query->orderBy('id DESC');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10

            ]
        ]);


        return $this->render('view', compact('dataProvider'));

    }
}