<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Videos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="create-videos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Videos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'videoId',
            'title',
            'description:ntext',
            'tags',
            'status',
            //'hasThumbnail',
            //'videoName',
            //'createdAt',
            //'updatedAt',
            //'createdBy',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
