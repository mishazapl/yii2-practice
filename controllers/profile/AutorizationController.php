<?php

namespace app\controllers\profile;

use app\controllers\SiteAbstract;
use app\models\Article\Article;
use app\models\profile\SignupForm;
use app\models\User;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\HttpException;
use yii\web\Response;
use app\models\profile\LoginForm;

class AutorizationController extends SiteAbstract
{

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
        /**
         * Данный способ служит оптимизацией запроса к бд.
         * В случае без хеширование бд 2 лишних запроса, в случае с хешерованием 1 лишний.
         * Без хеширование сэкономил 2млс в случае хеширования 1 млс.
         *
         * Алгоритм работы.
         *
         * 1. Выбираем все статьи/определенное кол-во в виде массива;
         * 1. Делаем из него с помощью arrayHelperMap массив вида user_id=>user_id;
         * 1. Выбираем всех user_id и делаем массив id=>login;
         * 1. В виде выбираем article['header'], user Login users[article['user_id'];
         *
         */
        $articles = Article::find()->asArray()->all();
        $idUser = ArrayHelper::map($articles, 'user_id', 'user_id');
        $users  = ArrayHelper::map(User::find()->where(['in', 'id', $idUser])->select(['id', 'login'])->asArray()->all(), 'id', 'login');


        $title = 'Блог по Web-разработки Yii2, PHP7, Курсы.';
        return $this->render('index', compact('title', 'users', 'articles'));
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            throw new HttpException(403, 'Вы уже авторизованы.');
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        /**
         * Обновления токена после выхода.
         */

        $user = User::find()->where(['id' => Yii::$app->user->id])->one();
        $user->remember_token = Yii::$app->security->generateRandomString();
        $user->update();

        Yii::$app->user->logout();

        return $this->goHome();
    }


    public function actionSignup()
    {
        if (!Yii::$app->user->isGuest) {
           throw new HttpException(403, 'Вы уже зарегистрированы.');
        }

        $model = new SignupForm();

        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    /**
                     * Назначение роли
                     */

                    $user = Yii::$app->authManager->getRole('user');
                    Yii::$app->authManager->assign($user, Yii::$app->user->getId());

                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

}
