<?php

namespace app\controllers\profile;

use app\controllers\SiteAbstract;
use app\models\Article\Article;
use app\models\profile\SignupForm;
use app\models\User;
use Yii;
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
//        $auth = Yii::$app->authManager;
//
//        $admin = $auth->createRole('admin');
//        $user = $auth->createRole('user');
//        $banned = $auth->createRole('banned');
//
//        // запишем их в БД
//        $auth->add($admin);
//        $auth->add($user);
//        $auth->add($banned);
//
//        $auth->addChild($admin,$user);

        $title = 'Блог по Web-разработки Yii2, PHP7, Курсы.';
        $result = Article::articlePaginate('/', 3);

        return $this->render('index', array
            (
                'title' => $title,
                'articles' => $result['articles'],
                'pages' => $result['pages'],

            )
        );
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

        if (Yii::$app->user->isGuest) {
            throw new HttpException(403, 'Вы еще не авторизованы.');
        }

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
