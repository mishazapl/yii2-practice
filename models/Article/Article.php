<?php

namespace app\models\Article;

use app\components\MyHelper;
use app\controllers\SaveImage;
use app\models\User;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\data\Pagination;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "article".
 *
 * @property int $id
 * @property int $user_id
 * @property string $header
 * @property string $small_text
 * @property string $full_text
 * @property string $link_photo
 * @property string $created_at
 * @property string $updated_at
 *
 * @property User $user
 */
class Article extends ActiveRecord
{

    public $image;

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['header', 'small_text', 'full_text'], 'required'],
            [['user_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['full_text'], 'string', 'min' => 20, 'max' => 5000],
            [['small_text'], 'string', 'min' => 15, 'max' => 2500],
            [['header'], 'string', 'min' => 10, 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'Владелец',
            'header' => 'Заголовок',
            'small_text' => 'Короткое описание',
            'full_text' => 'Полное описание',
            'link_photo' => 'Фотография',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    use SaveImage;

    public function updateArticle()
    {

        $article = Article::find()->where(['id' => Yii::$app->request->get('id')])->one();

        $article->header = $this->header;
        $article->small_text = $this->small_text;
        $article->full_text = $this->full_text;

        if (!is_null($article->photo_link) && !is_null($this->image)) {
            MyHelper::deleteFile($article->photo_link);
        }

        if (file_exists('/uploads/article/'.$article->id)) {
            mkdir('uploads/article/' . $article->id, 0777);
        }

        $this->saveImage($article, 'uploads/article/'.$article->id.'/');

        $article->update();

    }

    public function createArticle()
    {
        /**
         * Сохранение id создателя.
         */
        $this->user_id = Yii::$app->user->identity->id;

        $this->save();

        /**
         * Получение id статьи после создания и сохранение ее.
         */

        mkdir('uploads/article/' . $this->id, 0777);

        $this->saveImage($this, 'uploads/article/'.$this->id.'/');

        $this->update();

    }

    /**
     * @param $route
     * @return mixed
     *
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
     */

    public static function articlePaginate($route, $pageSize = 5)
    {
        $model = Article::find();

        $result['pages'] = $pages = new Pagination(['totalCount' => $model->count(), 'pageSize' => $pageSize, 'pageSizeParam' => false, 'forcePageParam' => false]);

        $pages->route = $route;

        $result['articles'] = $articles = $model->offset($pages->offset)->limit($pages->limit)->with('user')->all();

        return $result;
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
