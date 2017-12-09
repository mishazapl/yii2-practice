<?php

use yii\db\Migration;

/**
 * Class m171209_102824_comment_article
 */
class m171209_102824_comment_article extends Migration
{
    public function up()
    {
        $tableOptions = null;

        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('comment_article', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'article_id' => $this->integer()->notNull(),
            'comment_id' => $this->integer()->notNull(),
        ], $tableOptions);
        $this->addForeignKey("FK_COMMENT_ARTICLE_USER", 'comment_article', 'user_id', 'user', 'id', 'CASCADE');
        $this->addForeignKey("FK_COMMENT_ARTICLE_ARTICLE", 'comment_article', 'article_id', 'article', 'id', 'CASCADE');
        $this->addForeignKey("FK_COMMENT_ARTICLE_COMMENT_ARTICLES", 'comment_article', 'comment_id', 'CommentArticles', 'id', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey("FK_COMMENT_ARTICLE_USER", 'comment_article');
        $this->dropForeignKey("FK_COMMENT_ARTICLE_ARTICLE", 'comment_article');
        $this->dropForeignKey("FK_COMMENT_ARTICLE_COMMENT_ARTICLES", 'comment_article');
        $this->dropTable('article');
    }
}
