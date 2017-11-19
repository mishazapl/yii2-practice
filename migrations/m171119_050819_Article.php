<?php

use yii\db\Migration;

/**
 * Class m171119_050819_Article
 */
class m171119_050819_Article extends Migration
{

    public function up()
    {
        $tableOptions = null;

        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('article', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'head' => $this->string()->notNull(),
            'short_text' => $this->string()->notNull(),
            'full_text' => $this->string()->notNull(),
            'created_at' => $this->timestamp()->defaultValue(null),
            'updated_at' => $this->timestamp()->defaultValue(null),
        ], $tableOptions);
        $this->addForeignKey("FK_ARTICLE_USER", 'article', 'user_id', 'user', 'id', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey("FK_ARTICLE_USER", 'article');
        $this->dropTable('article');
    }

}
