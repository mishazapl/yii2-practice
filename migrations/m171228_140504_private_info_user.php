<?php

use yii\db\Migration;

/**
 * Class m171228_140504_private_info_user
 */
class m171228_140504_private_info_user extends Migration
{
    public function up()
    {
        $tableOptions = null;

        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('private_info_user', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull()->unique(),
            'first_name' => $this->string('50'),
            'last_name' => $this->string('50'),
            'gender' => $this->char(),
            'message' => $this->integer(),
            'rank' => $this->string('50'),
            'created_at' => $this->timestamp()->defaultValue(null),

        ], $tableOptions);

        $this->addForeignKey("FK_PRIVATE_INFO_USER", 'private_info_user', 'user_id', 'user', 'id', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('private_info_user');
    }
}
