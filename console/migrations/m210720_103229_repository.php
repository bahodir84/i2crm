<?php

use yii\db\Migration;

/**
 * Class m210720_103229_repository
 */
class m210720_103229_repository extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%repository}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'user_id' => $this->integer(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addForeignKey('FK_user_repo', 'repository','user_id', 'user','id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210720_103229_repository cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210720_103229_repository cannot be reverted.\n";

        return false;
    }
    */
}
