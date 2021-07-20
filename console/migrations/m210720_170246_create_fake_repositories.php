<?php
/* @var $user_last common\models\User */
use common\models\User;
use Faker\Factory;
use yii\db\Migration;

/**
 * Class m210720_170246_create_fake_repositories
 */
class m210720_170246_create_fake_repositories extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $faker = Factory::create();

        $user_last = User::find()->orderBy(['id'=>SORT_DESC])->one();
        $user_last_id = $user_last->id;
        for($i=1; $i<=15; $i++){
            $current = time()-rand(1,5000);
            $this->insert('repository',[
                'name'=> 'demorepo of '.$faker->name,
                'user_id' => rand($user_last_id-2, $user_last_id),
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
        echo "m210720_170246_create_fake_repositories cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210720_170246_create_fake_repositories cannot be reverted.\n";

        return false;
    }
    */
}
