<?php 

/* @var $model common\models\Videos */
/* @var $similarVideos common\models\Videos */
use yii\helpers\Html;
use yii\helpers\Url;
use common\models\video;
?>

<div class="row">
	<div class="col-sm-8">
		<div class="embed-responsive embed-responsive-16by9">
              <video class="embed-responsive-item" 
              	poster="<?= $model->getThumbnailLink()?>"
              	src="<?= $model->getVideoLink()?>" controls>
              </video>
    	</div>
    	<h6><?= $model->title ?></h6>

    	<div class="d-flex justify-content-between align-items-center"> 
    		<div> <?=$model->getViews()->count()?> views  .<?=Yii::$app->formatter->asDate($model->created_at)?>
    			
    		</div>

			<div>
			<?php \yii\widgets\Pjax::begin() ?>
				<?=$this->render('_buttons',[
					'model'=>$model]) ?>


				
			<?php \yii\widgets\Pjax::end() ?>

		</div>
	</div>
	<div>
		<p><?=\common\helpers\Html::channelLink($model->createdBy) ?>
				
			</p>
		<?= \yii\helpers\Html::encode($model->description) ?>
	</div>
</div>
	<div class="col-sm-4">
		<?php foreach ($similarVideos as $similarVideo): ?>	
		<div class="media">
		<a href="<?= Url::to(['/video/view', 'id'=> $similarVideo->video_id])?>">
			
			<div class="embed-responsive embed-responsive-16by9 mr-2" style="width: 250px">
	              <video class="embed-responsive-item" 
	              	poster="<?= $similarVideo->getThumbnailLink()?>"
	              	src="<?= $similarVideo->getVideoLink()?>" >
	              </video>
    		</div>
		</a>
		<div class="media-body">
			<h6 class="m-0"> <?= $similarVideo-> title ?></h6>
			<div class="text-muted">
				<p class="m-0">
					<?= \common\helpers\Html::channelLink($similarVideo->createdBy) ?>
				</p>
				<small>
					<?= $similarVideo->getViews()->count() ?> views .
					<?= Yii::$app->formatter->asRelativeTime($similarVideo->created_at)?>

				</small>
			</div>
		</div>

	</div>

	<?php endforeach; ?> 
	</div>

</div>