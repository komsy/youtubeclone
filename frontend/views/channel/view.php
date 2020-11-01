<?php 


/** @var $channel \common\models\user */
use yii\helpers\Url;
use yii\widgets\ListView;


/**@var \yii\web\View */
/**@var $channel \common\models\User */
/**@var $dataprovider \yii\data\ActiveDataProvider 
*/


?>

<div class="jumbotron">
	<h1 class="display-4"> <?= $channel->username?></h1>	
	<hr class="my-4">
	<?php \yii\widgets\Pjax::begin() ?>
		<?=$this->render('_subscribe',[
					'channel'=>$channel
				]) ?>

	<?php \yii\widgets\Pjax::end() ?>

</div>

<?=ListView::widget([
    'dataProvider'=>$dataProvider,
    'itemView'=>'@frontend/views/video/video-item',
    'layout'=>'<div class="d-flex">{items}</div>{pager}',
    'itemOptions'=>[
        'tag'=>false
    ]
])?>
