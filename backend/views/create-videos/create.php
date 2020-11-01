<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CreateVideos */

$this->title = 'Create  Videos';
$this->params['breadcrumbs'][] = ['label' => 'Videos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="create-videos-create">
	<h1><?= Html::encode($this->title) ?></h1>
	<div class="d-flex flex-column justify-content-center align-items-center">
		<div class="upload-icon">
			<i class="fas fa-upload"></i>
		</div>
		<br>
		<p class="m-0">Drag and drop a file you want to upload</p>
		<p class="text-muted">Your Video will be private until you publish it</p>
		<?php  ActiveForm::begin([
		    'options'=>['enctype'=>'multipart/form-data']
		]); ?>
		<button class="btn btn-primary btn-file">
			Select file
			<input type="file" id="videoFile" name="video">
		</button>
		 <?php ActiveForm::end(); ?>
	</div>	    
</div>
