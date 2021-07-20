<?php

use yii\db\Migration;

/**
 * Class m210720_081607_add_admin_to_user
 */
class m210720_081607_add_admin_to_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $password_hash = Yii::$app->getSecurity()->generatePasswordHash('admin123');
        $auth_key = Yii::$app->security->generateRandomString();
        $current = time();

        $this->insert('user',[
            'username'=>'admin',
            'email'=>'admin@mail.ru',
            'password_hash' => $password_hash,
            'auth_key' => $auth_key,
            'status' => 10,
            'created_at' => $current,
            'updated_at' => $current
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210720_081607_add_admin_to_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210720_081607_add_admin_to_user cannot be reverted.\n";

        return false;
    }
    */
}
