<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 24.10.17
 * Time: 17:07
 */

namespace app\components;

use yii\base\Widget;
use app\models\User;
use yii\web\Controller;
use Yii;
use app\models\Category;

class MenuWidget extends Widget
{

    public $views;
    public $model;

    public function init()
    {
        parent::init();
        if( $this->views === null){

            $this->views = 'menu';
        }
        $this->views .= '.php';
    }

    public function run()
    {
        parent::run();
            $model = Category::find()->all();
            return $this->ToTemplate($model);

    }


    protected function ToTemplate($model)
    {

        ob_start();
        include __DIR__ . '/views/' . $this->views;
        return ob_get_clean();


    }


}