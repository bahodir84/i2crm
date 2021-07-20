<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\RepositorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Repositories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="repository-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'attribute'=>'user_id',
                'value'=>'user.username'
            ],
//            'created_at',
            'updated_at',
        ],
    ]); ?>


</div>
