<?php

namespace app\models\Article;

use app\models\User;
use Yii;

/**
 * This is the model class for table "comment_article".
 *
 * @property int $id
 * @property int $user_id
 * @property int $article_id
 * @property int $comment_id
 *
 * @property Article $article
 * @property CommentArticles $comment
 * @property User $user
 */
class Comment_Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comment_article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'article_id', 'comment_id'], 'required'],
            [['user_id', 'article_id', 'comment_id'], 'integer'],
            [['article_id'], 'exist', 'skipOnError' => true, 'targetClass' => Article::className(), 'targetAttribute' => ['article_id' => 'id']],
            [['comment_id'], 'exist', 'skipOnError' => true, 'targetClass' => CommentArticles::className(), 'targetAttribute' => ['comment_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'article_id' => 'Article ID',
            'comment_id' => 'Comment ID',
        ];
    }

    /**
     * У одной статьи много комментариев.
     */
    public function getArticleComments()
    {
        return $this->hasMany(Article::className(), ['id' => 'article_id'])
            ->viaTable('CommentArticles', ['comment_id' => 'id']);
    }

    /**
     * У одного комментария может быть одна статья.
     */
    public function getCommentArticles()
    {
        return $this->hasOne(CommentArticles::className(), ['id' => 'comment_id'])
            ->viaTable('article', ['article_id' => 'id']);
    }

    /**
     * У одного юзера много комментариев.
     */
    public function getUserComment()
    {
        return $this->hasMany(User::className(), ['id' => 'user_id'])
            ->viaTable('CommentArticles', ['comment_id' => 'id']);
    }


}
