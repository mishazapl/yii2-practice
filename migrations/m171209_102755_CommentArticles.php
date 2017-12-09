<?php

use yii\db\Migration;

/**
 * Class m171209_102955_CommentArticle
 */
class m171209_102755_CommentArticles extends Migration
{
    public function up()
    {
        $tableOptions = null;

        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('CommentArticles', [
            'id' => $this->primaryKey(),
            'comment' => $this->string('500')->notNull(),
            'photo_link' => $this->string(),
            'created_at' => $this->timestamp()->defaultValue(null),
            'updated_at' => $this->timestamp()->defaultValue(null),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('CommentArticles');
    }

}
