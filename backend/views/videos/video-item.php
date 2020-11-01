<?php
use yii\helpers\StringHelper;
use yii\helpers\Url;

/* @var $model \common\models\Videos */
?>
<div class="media">
	<a href="<?=Url::to(['/videos/update','id'=>$model->video_id])?>">
		<div class="embed-responsive embed-responsive-16by9 mr-2" style="width: 120px">
              <video class="embed-responsive-item" 
              	poster="<?= $model->getThumbnailLink()?>""
              	src="<?= $model->getVideoLink()?>" controls>
              </video>
 	 </div>
	</a>
  <div class="media-body">
    <h5 class="mt-0"><?=$model->title?></h5>
  	<?=StringHelper::truncateWords($model->description, 10)?>
  </div>
</div>