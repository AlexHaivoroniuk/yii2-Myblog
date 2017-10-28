<?php

namespace app\controllers;

use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\controllers\CustomController;
use yii\web\Response;
use yii\widgets\ActiveForm;
use app\models\Post;
use yii\data\ActiveDataProvider;


class SiteController extends CustomController
{

    public $Password;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post', 'get'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->setMeta('ita-studio.ru', 'myblog', 'Creating blog Yii2');
        $query = Post::find();
        $query->orderBy('id DESC');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10

            ]
        ]);


        return $this->render('index', compact('dataProvider'));
    }


    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new User();
        $model->scenario =  'login';
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }


    /**
     * Modal window register
     * @return array|string|Response
     *
     */
    /*public function actionRegistr()
    {
        if(!Yii::$app->user->isGuest)
        {
            return $this->redirect('/');
        }
        // Подключаемся к модели
        $model = new User();
        // Если чтото пришло

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()))
        {
            $this->Password = $model->password;
            if(!User::find()->where(['email'=> $model->email])->limit(1)->all())
            {
                $model->password= Yii::$app->security->generatePasswordHash($model->password);
                $model->code = Yii::$app->getSecurity()->generateRandomString(10);
                $model->active = 0;
                if ($model->save())
                {
                    $model->sendConfirmationLink();
                    Yii::$app->session->setFlash('success', " Выслана ссылка для потверждения Вашей почты.");
                    return $this->redirect('/');
                }
                else
                {
                    Yii::$app->response->format = Response::FORMAT_JSON;
                    return ActiveForm::validate($model);
                }
            }
            else {
                return $this->redirect('/');
            }
        }
        return $this->renderAjax('_form_registr', compact('model'));
    }*/
    /**
     *
     *Separate page register
     * 
     * @return string|Response
     */
    public function actionRegister()
    {
        if(!Yii::$app->user->isGuest)
        {
            return $this->redirect('/');
        }
        $this->setMeta('Registration', 'blog', 'Создаём блог на yii2');
        // Подключаемся к модели
        $model = new User();
        $model->scenario = 'register';
        // Если чтото пришло
        if ($model->load(Yii::$app->request->post()))
        {
            $this->Password = $model->password;
            if(!User::find()->where(['email'=> $model->email])->limit(1)->all())
            {
                $model->password= Yii::$app->security->generatePasswordHash($model->password);
                $model->code = Yii::$app->getSecurity()->generateRandomString(10);
                $model->active = 0;
                if ($model->save())
                {
                    //Assignning role to user
                    $auth = Yii::$app->authManager;
                    $authorRole = $auth->getRole('user');
                    $auth->assign($authorRole, $model->id);
                    
                    //Sending confirmation mail
                    $model->sendConfirmationLink();
                    Yii::$app->session->setFlash('success', " Link is sent to confirm your e-mail.");
                    return $this->goHome();
                }
                else
                {
                    $model->password = $this->Password;
                    return $this->render('register', compact('model'));
                }
            }
            else
            {
                return $this->render('register', compact('model'));
            }

        }
        return $this->render('register', compact('model'));
    }


    public function actionConfirmemail()
    {
        
        if(!Yii::$app->user->isGuest)
        {
            return $this->goHome();
        }
       
        $code = htmlspecialchars(Yii::$app->request->get('code'));
        $email = htmlspecialchars(Yii::$app->request->get('email'));
        
        $model = User::find()->where(['email' => $email, 'code' => $code])->one();
       
        if ($model->id)
        {
            $model->code = '';
            $model->active = User::ACTIVE_USER;
            $model->save();
            $model->login();
            Yii::$app->session->setFlash('success', "Your  E-mail is confirmed.");
            return $this->goHome();
        }
        else
        {
            return $this->goHome();
        }

    }


    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
