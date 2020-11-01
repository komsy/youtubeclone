<?php 

/* @var $model common\models\Videos */
use yii\helpers\Url;
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
		
	</div>

</div>