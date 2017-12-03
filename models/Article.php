<?php

namespace app\models;

use app\controllers\SaveImage;
use Yii;
use yii\db\ActiveRecord;

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
            deleteFile($article->photo_link);
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
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
