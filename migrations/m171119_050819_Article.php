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
            'header' => $this->string('300')->notNull(),
            'small_text' => $this->string('2500')->notNull(),
            'full_text' => $this->string('5000')->notNull(),
            'photo_link' => $this->string(),
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
