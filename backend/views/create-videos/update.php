<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CreateVideos */

$this->title = 'Update Create Videos: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Create Videos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->videoId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="create-videos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
