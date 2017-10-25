<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 24.10.17
 * Time: 10:59
 */

namespace app\components;

use yii\base\Widget;
use app\models\User;
use yii\web\Controller;
use Yii;


class LoginWidget extends Widget
{
    public $views;
    public $model;


    public function init()
    {
        parent::init();
        if( $this->views === null){

            $this->views = 'login';
        }
        $this->views .= '.php';
    }


    public function run()
    {
        parent::run();
        if( !Yii::$app->user->isGuest )
        {
            $model = User::findOne(Yii::$app->user->id);
            return $this->catToTemplateUser($model);
        } else {
            $model = new User;
//            $mod = User::find()->all();
//            print_r($mod);
            return $this->catToTemplate($model);
        }

    }

    // Передача в шаблон параметров пользователя
    protected function catToTemplate($model)
    {

        ob_start();
        include __DIR__ . '/views/' . $this->views;
        return ob_get_clean();


    }
    // передача в шаблон модели пользователя
    protected function catToTemplateUser($model)
    {
        ob_start();
        include __DIR__ . '/views/' . $this->views;
        return ob_get_clean();


    }

}