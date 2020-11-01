<?php
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\DataProviderInterface */
?>

<?=ListView::widget([
    'dataProvider'=>$dataProvider,
    'itemView'=>'video-item',
    'layout'=>'<div class="d-flex">{items}</div>{pager}',
    'itemOptions'=>[
        'tag'=>false
    ]
])?>