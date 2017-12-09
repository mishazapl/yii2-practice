<?php

namespace app\models\Article;

use Yii;

/**
 * This is the model class for table "CommentArticles".
 *
 * @property int $id
 * @property string $comment
 * @property string $photo_link
 * @property string $created_at
 * @property string $updated_at
 *
 * @property CommentArticle[] $commentArticles
 */
class CommentArticles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'CommentArticles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['comment'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['comment'], 'string', 'max' => 500],
            [['photo_link'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'comment' => 'Comment',
            'photo_link' => 'Photo Link',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCommentsArticles()
    {
        return $this->hasMany(CommentArticles::className(), ['comment_id' => 'id']);
    }
}
