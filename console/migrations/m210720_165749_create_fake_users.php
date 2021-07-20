<?php

use Faker\Factory;
use yii\db\Migration;

/**
 * Class m210720_165749_create_fake_users
 */
class m210720_165749_create_fake_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $faker = Factory::create();

        $password_hash = Yii::$app->getSecurity()->generatePasswordHash('admin123');
        $auth_key = Yii::$app->security->generateRandomString();
        $current = time();

        for($i=1; $i<=3; $i++){
            $this->insert('user',[
                'username'=>$faker->firstName,
                'email'=> $faker->email,
                'password_hash' => $password_hash,
                'auth_key' => $auth_key,
                'status' => 10,
                'created_at' => $current,
                'updated_at' => $current
            ]);
        }

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210720_165749_create_fake_users cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210720_165749_create_fake_users cannot be reverted.\n";

        return false;
    }
    */
}
